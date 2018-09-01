<?php

class video extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('video_model');

        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			return show_error('Halaman Ini hanya dapat diakses oleh admin');
		}
    }

    /*
     * Show video
     */
    function index()
    {
        $data['video'] = $this->video_model->semua_data();

        $data['_view'] = 'admin/video/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new video
     */
    function tambah()
    {
        $this->load->library('form_validation');

        // $this->form_validation->set_rules('id','Id video','required|max_length[20]');
        $this->form_validation->set_rules('nama','Nama video','required|max_length[20]');

        if($this->form_validation->run())
        {
          $params = array(
            'nama' => $this->input->post('nama'),
          );

          if (!empty($_FILES['gambar']['name'])) {
              $nama_gambar    = $this->upload_foto($this->input->post('nama'));
              $params['link'] = $nama_gambar;
          }

          $query = $this->video_model->input_data($params);
          
          redirect('admin/video');
        }
        else
        {
          $data['_view'] = 'admin/video/add';
          $this->load->view('_layouts/admin/index',$data);
        }
    }

    /*
     * Editing a video
     */
    function edit($id)
    {
        // check if the video exists before trying to edit it
        $data['video'] = $this->video_model->detail_data($id);

        if(isset($data['video']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama','Nama video','required|max_length[20]');

            if($this->form_validation->run())
            {
                $data_post = array(
                  'nama' => $this->input->post('nama'),
                );

                $this->video_model->update_data($data_post, $id);
                redirect('admin/video');
            }
            else
            {
                $data['_view'] = 'admin/video/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data video tidak ada');
    }
    
    /*
     * Deleting video
     */
    function hapus($id)
    {
        $video = $this->video_model->detail_data($id);

        // check if the video barang exists before trying to delete it
        if(isset($video->id))
        {
          $this->video_model->hapus_data($video->id);
          redirect('admin/video');
        }
        else
          show_error('Data video tidak ada');
    }

    /*
     * fungsi upload gambar
     */
    function upload_foto($nama){
        $set_name   = $nama."-".RAND(0000,9999);
        $path       = $_FILES['gambar']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

        $config['upload_path']          = './upload/produk/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 9024;
        $config['file_name']            = "$set_name".$extension;
        $this->load->library('upload', $config);
        // proses upload
        $upload = $this->upload->do_upload('gambar');

        if ($upload == FALSE) {
            $error = array('error' => $this->upload->display_errors());
            dump($error);
            dump('Gambar gagal diupload! Periksa gambar');
        }

        $upload = $this->upload->data();
        return $upload['file_name'];
    }

}

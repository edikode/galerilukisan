<?php

class Artikel extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');

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
     * Show artikel
     */
    function index()
    {
        $data['artikel'] = $this->Artikel_model->semua_data();

        $data['_view'] = 'admin/artikel/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new artikel
     */
    function tambah()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','Nama Artikel','max_length[100]');
        $this->form_validation->set_rules('teks','Teks Artikel','required');

        if($this->form_validation->run())
        {
            $params = array(
                'nama' => $this->input->post('nama'),
                'link' => $this->fungsi->link($this->input->post('nama')),
                'teks' => $this->input->post('teks'),
                'tanggal' => date("Y-m-d"),
                'penulis' => "Administrator",
            );

            if (!empty($_FILES['gambar']['name'])) {
                $nama_gambar    = $this->upload_foto($this->input->post('nama'));
                $params['gambar'] = $nama_gambar;
            }
            $query = $this->Artikel_model->input_data($params);
          
            redirect('admin/artikel');
        }
        else
        {
            $data['_view'] = 'admin/artikel/add';
            $this->load->view('_layouts/admin/index',$data);
        }
    }

    /*
     * Editing a artikel
     */
    function edit($id)
    {
        // check if the artikel exists before trying to edit it
        $data['artikel'] = $this->Artikel_model->detail_data($id);

        if(isset($data['artikel']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama','Nama Produk','max_length[100]');
            $this->form_validation->set_rules('teks','Teks Artikel','required');

            if($this->form_validation->run())
            {
                $params = array(
                    'nama' => $this->input->post('nama'),
                    'link' => $this->fungsi->ceklink($this->input->post('nama')),
                    'teks' => $this->input->post('teks'),
                    'tanggal' => date("Y-m-d"),
                    'penulis' => "Administrator",
                );

                if (!empty($_FILES['gambar']['name'])) {
                    $nama_gambar    = $this->upload_foto($this->input->post('nama'));
                    $params['gambar'] = $nama_gambar;
                }

                $this->Artikel_model->update_data($params, $id);
                redirect('admin/artikel');
            }
            else
            {
                $data['_view'] = 'admin/artikel/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data Artikel tidak ada');
    }
    
    /*
     * Deleting artikel
     */
    function hapus($id)
    {
        $artikel = $this->Artikel_model->detail_data($id);

        // check if the artikel exists before trying to delete it
        if(isset($artikel->id))
        {
          $this->Artikel_model->hapus_data($artikel->id);
          redirect('admin/artikel');
        }
        else
          show_error('Data Artikel tidak ada');
    }

    /*
     * fungsi upload gambar
     */
    function upload_foto($nama){
        $set_name   = $nama."-".RAND(0000,9999);
        $path       = $_FILES['gambar']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

        $config['upload_path']          = './upload/artikel/';
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

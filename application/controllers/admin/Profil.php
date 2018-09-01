<?php

class Profil extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');

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
     * Listing of profil
     */
    function index()
    {
        $data['profil'] = $this->Profil_model->detail_data(1);
     
        $data['_view'] = 'admin/profil';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new profil
     */
    function add()
    {
        
    }

    /*
     * Editing a profil
     */
    function edit($id)
    {
        $params = array(
            'nama' => $this->input->post('nama'),
            'teks' => $this->input->post('teks'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'facebook' => $this->input->post('facebook'),
        );

        if (!empty($_FILES['gambar']['name'])) {
            $nama_gambar    = $this->upload_foto($this->input->post('nama'));
            $params['gambar'] = $nama_gambar;
        }

        $this->Profil_model->update_data($params, $id);
        redirect('admin/profil');
    }

    /*
     * Deleting profil
     */
    function hapus($id)
    {
        
    }

    function upload_foto($nama){
        $set_name   = $nama."-".RAND(0000,9999);
        $path       = $_FILES['gambar']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

        $config['upload_path']          = './upload/profil/';
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

    function hapusgambar($id)
    {
        $profil = $this->Profil_model->detail_data(1);

        if(isset($profil->id))
        {
            unlink('upload/profil/'.$profil->gambar);
            $data['gambar'] = "";
            $this->Profil_model->update_data($data, $profil->id);
            redirect('admin/profil');
        }
        else
          show_error('Data Profil tidak ada');
    }
}

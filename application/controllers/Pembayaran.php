<?php

class Pembayaran extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
        $this->load->model('Pemesanan_model');
        $this->load->model('Profil_model');
        $this->load->model('Artikel_model');

        if ($this->ion_auth->is_admin())
		{
			return show_error('Halaman ini hanya dapat diakses oleh pelanggan');
		} 
		else if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
    }

    function index()
    {
        $user = $this->ion_auth->user()->row();

        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['artikel'] = $this->Artikel_model->semua_data();
        $data['pembelian'] = $this->Pembelian_model->detail_front($user->id);
        $data['pemesanan'] = $this->Pemesanan_model->detail_front($user->id);
		$data['_view'] = 'front/pembayaran';
        $this->load->view('_layouts/front/index',$data);
    }

    function upload_bukti_pembelian($id)
    {
        if (!empty($_FILES['gambar']['name'])) {
            $nama_gambar    = $this->upload_foto("pembelian");
            $params['gambar'] = $nama_gambar;
            $params['status'] = 3;
        }
        
        $query = $this->Pembelian_model->update_data($params,$id);

        redirect('pembayaran');
    }

    function upload_bukti_pemesanan($id)
    {
        if (!empty($_FILES['gambar']['name'])) {
            $nama_gambar    = $this->upload_foto("pemesanan");
            $params['gambar'] = $nama_gambar;
            $params['status'] = 3;
        }
        
        $query = $this->Pemesanan_model->update_data($params,$id);

        redirect('pembayaran');
    }

    /*
     * fungsi upload gambar
     */
    function upload_foto($id){
        $set_name   = "gambar-".$id;
        $path       = $_FILES['gambar']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

        $config['upload_path']          = './upload/konfirmasi/';
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

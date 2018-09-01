<?php

class Pesan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Artikel_model');
        $this->load->model('Pemesanan_model');
        $this->load->model('Kategori_model');
        $this->load->model('Ukuran_model');
        $this->load->model('Harga_model');

        
    }

    function index()
    {
        if ($this->ion_auth->is_admin())
        {
            return show_error('Halaman ini hanya dapat diakses oleh pelanggan');
        } 
        else if (!$this->ion_auth->logged_in())
        {
            $this->session->set_userdata('pesan_login', 'Untuk melakukan pemesanan lukisan anda harus login terlebih dahulu atau daftar akun untuk yang belum mempunyai akun.');
            redirect('pesan/info', 'refresh');
        }

    	$this->load->library('form_validation');

        $this->form_validation->set_rules('ukuran','Ukuran Lukisan','required');
        $this->form_validation->set_rules('jumlah','Jumlah Lukisan','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if($this->form_validation->run())
        {
            $user = $this->ion_auth->user()->row();
            $cari_harga = $this->Harga_model->cari_harga($this->input->post('ukuran'),$this->input->post('kategori'));
            $invoice = RAND(0000,9999);

            $params = array(
                'invoice' => $invoice,
                'tanggal' => date('Y-m-d'),
                'pembeli_id' => $user->id,
                'kategori_id' => $this->input->post('kategori'),
                'ukuran_id' => $this->input->post('ukuran'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('jumlah')*$cari_harga->harga,
                'keterangan' => $this->input->post('keterangan'),
            );

            if (!empty($_FILES['gambar']['name'])) {
                $nama_gambar    = $this->upload_foto("gambar");
                $params['gambar'] = $nama_gambar;
            }
            $query = $this->Pemesanan_model->input_data($params);
            
            $id = $this->db->insert_id();
            redirect('pesan/checkout/'.$id);

        }
        else
        {
            $data['profil'] = $this->Profil_model->detail_data(1);
            $data['artikel'] = $this->Artikel_model->semua_data();

            // admin
            $data['kategori'] = $this->Kategori_model->semua_data();
            $data['ukuran'] = $this->Ukuran_model->semua_data();
            $data['_view'] = 'front/pesan';
        	$this->load->view('_layouts/front/index',$data);
        }
        
    }

    function info()
    {
        if ($this->ion_auth->is_admin())
        {
            return show_error('Halaman ini hanya dapat diakses oleh pelanggan');
        } 
        else if ($this->ion_auth->logged_in())
        {
            redirect('pesan', 'refresh');
        }

        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['artikel'] = $this->Artikel_model->semua_data();

        // admin
        $data['kategori'] = $this->Kategori_model->semua_data();
        $data['ukuran'] = $this->Ukuran_model->semua_data();
        $data['_view'] = 'front/info-pesan';
        $this->load->view('_layouts/front/index',$data);
    }

    function Checkout($id)
    {
        $data['pemesanan'] = $this->Pemesanan_model->detail_data($id);
        $data['kategori'] = "pemesanan";
        $data['artikel'] = $this->Artikel_model->semua_data();
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['_view'] = 'front/checkout';
        $this->load->view('_layouts/front/index',$data);
    }

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

    public function cari_harga()
    {
        $kategori = $this->input->get('kategori', TRUE);
        $ukuran = $this->input->get('ukuran', TRUE);
        $harga = $this->Harga_model->cari_harga($kategori,$ukuran);

        echo $harga->harga;
    }

}

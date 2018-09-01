<?php

class Beli extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Produk_model');
        $this->load->model('Profil_model');
        $this->load->model('Harga_model');
        $this->load->model('Ukuran_model');
        
        if ($this->ion_auth->is_admin())
		{
			return show_error('Halaman ini hanya dapat diakses oleh pelanggan');
		} 
		else if (!$this->ion_auth->logged_in())
		{
            $this->session->set_userdata('pesan_login', 'Untuk melakukan pembelian lukisan anda harus login terlebih dahulu atau daftar akun untuk yang belum mempunyai akun.');
			redirect('auth/login', 'refresh');
		}
    }

    function Masuk_keranjang($link)
    {
		$produk = $this->Produk_model->detail_front($link);
        $ukuran = $this->Ukuran_model->detail_data($produk->ukuran_id);
        $cari_harga = $this->Harga_model->cari_harga($ukuran->id,$produk->kategori_id);

		$data = array(
			'id' => $produk->id,
			'name' => $produk->nama,
			'price' => $cari_harga->harga,
			'weight' => $ukuran->berat,
			'qty' => 1
		);

         $this->cart->insert($data);

        redirect('Beli/Detail_keranjang');
    }

    function Detail_keranjang()
    {
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['produk'] = $this->Produk_model->semua_data();
        $data['artikel'] = $this->Artikel_model->semua_data();
		$data['_view'] = 'front/keranjang-belanja';
        $this->load->view('_layouts/front/index',$data);
    }

    function Checkout()
    {
        $data['kategori'] = "pembelian";
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['produk'] = $this->Produk_model->semua_data();
        $data['artikel'] = $this->Artikel_model->semua_data();
		$data['_view'] = 'front/checkout';
        $this->load->view('_layouts/front/index',$data);
    }

    function Hapus_data($rowid)
    {
        $this->cart->remove($rowid);

        echo '<script type="text/javascript">window.history.go(-1);</script>';
    }

    function Hapus_keranjang()
    {
         $this->cart->destroy();

         echo '<script type="text/javascript">window.history.go(-1);</script>';
    }

}

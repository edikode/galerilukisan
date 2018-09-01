<?php

class Dashboard extends CI_Controller{
    //fungsi yg pertama kali dijalankan
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Pembelian_model');
        $this->load->model('Pemesanan_model');

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
     * Listing of dashboard
     */
    function index()
    {
        $data['data_pemesanan'] = $this->Pemesanan_model->semua_data();
        $data['pembeli'] = count($this->User_model->data_pembeli());
        $data['pembelian'] = count($this->Pembelian_model->pembelian_baru());
        $data['pemesanan'] = count($this->Pemesanan_model->pemesanan_baru());
        $data['_view'] = 'admin/dashboard';
        $this->load->view('_layouts/admin/index',$data);
    }
}
<?php

class Laporan_stok extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ukuran_model');
        $this->load->model('Harga_model');
        $this->load->model('Kategori_model');
        $this->load->model('Produk_model');
        $this->load->model('Profil_model');

        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) 
		{
			return show_error('Halaman Ini hanya dapat diakses oleh admin');
		}
    }

    function index()
    {
        $data['filter'] = $this->input->post('filter') ? $this->input->post('filter') : "";
        $data['laporan'] = $this->Produk_model->laporan_stok($data['filter']);

        $data['_view'] = 'admin/laporan/laporan_stok';
        $this->load->view('_layouts/admin/index',$data);
    }

    public function cetak($filter)
    {
        $data['laporan'] = $this->Produk_model->laporan_stok($filter);

        $data['filter'] = $filter;
        $data['profil'] = $this->Profil_model->detail_data(1);

        $this->load->view('pdf/laporan_stok',$data);

        $html = $this->output->get_output();

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("Laporan-Stok Produk.pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        // $this->dompdf->stream("Laporan_pembelian-".$bulan."-".$tahun.".pdf");

    }

}

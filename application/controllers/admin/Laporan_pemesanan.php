<?php

class Laporan_pemesanan extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->model('Kategori_model');
        $this->load->model('Ukuran_model');
        $this->load->model('User_model');
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
        $data['keyword'] = $this->input->post('keyword') ? $this->input->post('keyword') : "";
        $data['bulan'] = $this->input->post('bulan') ? $this->input->post('bulan') : date("m");
        $data['tahun'] = $this->input->post('tahun') ? $this->input->post('tahun') : date("Y");
        $data['laporan'] = $this->Pemesanan_model->data_laporan($data['keyword'],$data['bulan'],$data['tahun']);

        $data['_view'] = 'admin/laporan/laporan_pemesanan';
        $this->load->view('_layouts/admin/index',$data);
    }

    public function cetak($keyword,$bulan,$tahun)
    {
        if($keyword == "tanpa_keyword"){ $keyword = ""; }

        $data['laporan'] = $this->Pemesanan_model->data_laporan($keyword,$bulan,$tahun);

        $data['keyword'] = $keyword;

        $data['bulan'] = $this->fungsi->getBulan_id($bulan);
        $data['tahun'] = $tahun;
        $data['profil'] = $this->Profil_model->detail_data(1);

        $this->load->view('pdf/laporan_pemesanan',$data);

        $html = $this->output->get_output();

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("Laporan_pemesanan-".$data['bulan']."-".$tahun.".pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        // $this->dompdf->stream("Laporan_pembelian-".$bulan."-".$tahun.".pdf");

    }

}

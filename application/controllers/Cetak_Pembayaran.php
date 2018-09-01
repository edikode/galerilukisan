<?php

class Cetak_pembayaran extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('DetailPembelian_model');
        $this->load->model('Pembelian_model');
        $this->load->model('Kategori_model');
        $this->load->model('Ukuran_model');
        $this->load->model('User_model');

    }

    public function cetak($id)
    {
        $data['cetak'] = $this->Pembelian_model->detail_data($id);
        $data['pembeli'] = $this->User_model->detail_data($data['cetak']->pembeli_id);

        $this->load->view('pdf/bukti_pembayaran',$data);

        $html = $this->output->get_output();

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("Bukti Pembayaran.pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        // $this->dompdf->stream("Laporan_pembelian-".$bulan."-".$tahun.".pdf");

    }

}

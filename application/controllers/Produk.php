<?php

class Produk extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Produk_model');
        $this->load->model('Profil_model');
        $this->load->model('Artikel_model');
        $this->load->model('Harga_model');
        $this->load->model('Ukuran_model');
    }

    function index($kategori)
    {
        

        //produk
        

        /*Class bootstrap pagination yang digunakan*/
        $config['first_link']       = 'Awal';
        $config['last_link']        = 'Akhir';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagination"><ul>';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        // $config['first_tag_open']   = '<li>';
        // $config['first_tag_close']  = '</li>';
        // $config['last_tag_open']    = '<li>';
        // $config['last_tag_close']   = '</li>'; 
        // $config['base_url'] = base_url() . 'produk/index';
        $config['per_page'] = 3; 
        $config['total_rows'] = $this->Produk_model->jml_data();
        $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        if ($kategori == "semua-kategori") {
            $config['base_url'] = base_url() . 'produk/index/' . $kategori;
            $data = $this->Produk_model->data_pag_semua($config['per_page'],$start); 
            $config['total_rows'] = $this->Produk_model->jml_data();
        } else {
            $config['base_url'] = base_url() . 'produk/index/' . $kategori;
            $data = $this->Produk_model->data_pag($config['per_page'],$start,$kategori); 
            $config['total_rows'] = $this->Produk_model->jml_data_pag($kategori);
        }
        
        $this->pagination->initialize($config);
        $data = array( 
            'artikel' =>$this->Artikel_model->semua_data(),
            'profil' =>$this->Profil_model->detail_data(1),
            'kategori' =>$this->Kategori_model->semua_data(),

            'produk' => $data,  
            'pagination' => $this->pagination->create_links(),
        );    

        $data['_view'] = 'front/produk';
        $this->load->view('_layouts/front/index',$data);
    }

    function detail($link)
    {
        $data['artikel'] = $this->Artikel_model->semua_data();
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['produk'] = $this->Produk_model->detail_front($link);
        $data['_view'] = 'front/produk-detail';
        $this->load->view('_layouts/front/index',$data);
    }

}

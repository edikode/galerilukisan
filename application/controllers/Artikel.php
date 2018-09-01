<?php

class Artikel extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Produk_model');
        $this->load->model('Profil_model');
    }

    function index()
    {
        
        //artikel
        // $filter = $this->session->userdata('filter_item'); 
        

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
        $config['base_url'] = base_url() . 'artikel/index';
        $config['per_page'] = 10; 
        $config['total_rows'] = $this->Artikel_model->jml_data();
        
        $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data = $this->Artikel_model->data_pag($config['per_page'],$start); 
        
        $this->pagination->initialize($config);
        $data = array( 
            'artikel' =>$this->Artikel_model->semua_data(),
            'profil' =>$this->Profil_model->detail_data(1),

            'data_artikel' => $data,  
            'pagination' => $this->pagination->create_links(),
        );    

        $data['_view'] = 'front/artikel';
        $this->load->view('_layouts/front/index',$data);
    }

    function detail($link)
    {
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['artikel'] = $this->Artikel_model->semua_data();
        $data['detail_artikel'] = $this->Artikel_model->detail_front($link);
        $data['_view'] = 'front/artikel-detail';
        $this->load->view('_layouts/front/index',$data);
    }

}

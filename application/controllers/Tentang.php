<?php

class Tentang extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Artikel_model');
    }

    function index()
    {
        $data['artikel'] = $this->Artikel_model->semua_data();
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['_view'] = 'front/tentang';
        $this->load->view('_layouts/front/index',$data);
    }

}

<?php

class Hubungi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Artikel_model');
    }

    function index()
    {
		$data['profil'] = $this->Profil_model->detail_data(1);
        $data['artikel'] = $this->Artikel_model->semua_data();
        $data['_view'] = 'front/hubungi';
        $this->load->view('_layouts/front/index',$data);
    }

}

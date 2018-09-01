<?php

class Video extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Profil_model');
    }

    function index()
    {
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['artikel'] = $this->Artikel_model->semua_data();
    	$data['video'] = $this->Artikel_model->semua_data();
        $data['_view'] = 'front/video';
        $this->load->view('_layouts/front/index',$data);
    }

    function detail($link)
    {
        $data['profil'] = $this->Profil_model->detail_data(1);
        $data['artikel'] = $this->Artikel_model->semua_data();
        $data['video'] = $this->Artikel_model->detail_front($link);
        $data['_view'] = 'front/video-detail';
        $this->load->view('_layouts/front/index',$data);
    }

}

<?php

class Ukuran extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ukuran_model');

        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    		else if (!$this->ion_auth->is_admin())
    		{
    			return show_error('Halaman Ini hanya dapat diakses oleh admin');
    		}
    }

    /*
     * Show ukuran
     */
    function index()
    {
        $data['ukuran'] = $this->Ukuran_model->semua_data();

        $data['_view'] = 'admin/ukuran/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new ukuran
     */
    function tambah()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('ukuran','Ukuran Produk','required|max_length[20]');
        $this->form_validation->set_rules('berat','Berat Produk','required|max_length[10]|numeric');

        if($this->form_validation->run())
        {
          $params = array(
            'ukuran' => $this->input->post('ukuran'),
            'berat' => $this->input->post('berat'),
          );
          $query = $this->Ukuran_model->input_data($params);
          
          redirect('admin/ukuran');
        }
        else
        {
          $data['_view'] = 'admin/ukuran/add';
          $this->load->view('_layouts/admin/index',$data);
        }
    }

    /*
     * Editing a ukuran
     */
    function edit($id)
    {
        $data['ukuran'] = $this->Ukuran_model->detail_data($id);

        if(isset($data['ukuran']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('ukuran','Ukuran Produk','required|max_length[20]');
            $this->form_validation->set_rules('berat','Berat Produk','required|max_length[20]|numeric');

            if($this->form_validation->run())
            {
                $data_post = array(
                  'ukuran' => $this->input->post('ukuran'),
                  'berat' => $this->input->post('berat'),
                );

                $this->Ukuran_model->update_data($data_post, $id);
                redirect('admin/ukuran');
            }
            else
            {
                $data['_view'] = 'admin/ukuran/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data ukuran tidak ada');
    }
    
    /*
     * Deleting ukuran
     */
    function hapus($id)
    {
        $ukuran = $this->Ukuran_model->detail_data($id);

        if(isset($ukuran->id))
        {
          $this->Ukuran_model->hapus_data($ukuran->id);
          redirect('admin/ukuran');
        }
        else
          show_error('Data ukuran tidak ada');
    }

}

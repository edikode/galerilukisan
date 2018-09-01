<?php

class Harga extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Harga_model');
        $this->load->model('Kategori_model');
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
     * Show Harga
     */
    function index()
    {
        $data['harga'] = $this->Harga_model->semua_data();

        $data['_view'] = 'admin/harga/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new Harga
     */
    function tambah()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('harga','Harga','required|max_length[50]|numeric');

        if($this->form_validation->run())
        {
          $params = array(
            'harga' => $this->input->post('harga'),
            'lama_pembuatan' => $this->input->post('lama_pembuatan'),
            'kategori_id' => $this->input->post('kategori_id'),
            'ukuran_id' => $this->input->post('ukuran_id'),
          );
          $query = $this->Harga_model->input_data($params);
          
          redirect('admin/harga');
        }
        else
        {
          $data['kategori'] = $this->Kategori_model->semua_data();
          $data['ukuran'] = $this->Ukuran_model->semua_data();
          $data['_view'] = 'admin/harga/add';

          $this->load->view('_layouts/admin/index',$data);
        }
    }

    /*
     * Editing a Harga
     */
    function edit($id)
    {
        $data['harga'] = $this->Harga_model->detail_data($id);

        if(isset($data['harga']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('harga','Harga','required|max_length[20]|numeric');

            if($this->form_validation->run())
            {
                $data_post = array(
                  'harga' => $this->input->post('harga'),
                  'lama_pembuatan' => $this->input->post('lama_pembuatan'),
                  'kategori_id' => $this->input->post('kategori_id'),
                  'ukuran_id' => $this->input->post('ukuran_id'),
                );

                $this->Harga_model->update_data($data_post, $id);
                redirect('admin/harga');
            }
            else
            {
                $data['kategori'] = $this->Kategori_model->semua_data();
                $data['ukuran'] = $this->Ukuran_model->semua_data();
                $data['_view'] = 'admin/harga/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data Harga tidak ada');
    }
    
    /*
     * Deleting Harga
     */
    function hapus($id)
    {
        $harga = $this->Harga_model->detail_data($id);

        if(isset($harga->id))
        {
          $this->Harga_model->hapus_data($harga->id);
          redirect('admin/harga');
        }
        else
          show_error('Data harga tidak ada');
    }

}

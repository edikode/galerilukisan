<?php

class Kategori extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');

        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			return show_error('Halaman Ini hanya dapat diakses oleh admin');
		}
    }

    /*
     * Show kategori
     */
    function index()
    {
        $data['kategori'] = $this->Kategori_model->semua_data();

        $data['_view'] = 'admin/kategori/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new kategori
     */
    function tambah()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','Nama Kategori','required|max_length[10]');

        if($this->form_validation->run())
        {
          $id = str_replace(' ', '', $this->input->post('id'));
          $params = array(
            'nama' => $this->input->post('nama'),
            'link' => $this->fungsi->link($this->input->post('nama')),
          );
          $query = $this->Kategori_model->input_data($params);
          
          redirect('admin/kategori');
        }
        else
        {
          $data['_view'] = 'admin/kategori/add';
          $this->load->view('_layouts/admin/index',$data);
        }
    }

    /*
     * Editing a kategori
     */
    function edit($id)
    {
        // check if the kategori exists before trying to edit it
        $data['kategori'] = $this->Kategori_model->detail_data($id);

        if(isset($data['kategori']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama','Nama Kategori','required|max_length[50]');

            if($this->form_validation->run())
            {
                $data_post = array(
                  'nama' => $this->input->post('nama'),
                  'link' => $this->fungsi->link($this->input->post('nama')),
                );

                $this->Kategori_model->update_data($data_post, $id);
                redirect('admin/kategori');
            }
            else
            {
                $data['_view'] = 'admin/kategori/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data Kategori tidak ada');
    }
    
    /*
     * Deleting kategori
     */
    function hapus($id)
    {
        $kategori = $this->Kategori_model->detail_data($id);

        // check if the kategori barang exists before trying to delete it
        if(isset($kategori->id))
        {
          $this->Kategori_model->hapus_data($kategori->id);
          redirect('admin/kategori');
        }
        else
          show_error('Data Kategori tidak ada');
    }

}

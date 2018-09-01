<?php

class Pemesanan extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->model('User_model');
        $this->load->model('Kategori_model');
        $this->load->model('Ukuran_model');

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
     * Show produk
     */
    function index()
    {
        $data['pemesanan'] = $this->Pemesanan_model->semua_data();

        $data['_view'] = 'admin/pemesanan/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new produk
     */
    function tambah()
    {
        
    }

    /*
     * Editing a produk
     */
    function edit($id)
    {
        $data['pemesanan'] = $this->Pemesanan_model->detail_data($id);

        if(isset($data['pemesanan']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('status','Status','required|max_length[20]');

            if($this->form_validation->run())
            {
                $data_post = array(
                  'status' => $this->input->post('status'),
                );

                $this->Pemesanan_model->update_data($data_post, $id);
                redirect('admin/pemesanan');
            }
            else
            {
                $data['_view'] = 'admin/pemesanan/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data Pemesanan tidak ada');
    }
    
    /*
     * Deleting produk
     */
    function hapus($id)
    {
        $pemesanan = $this->Pemesanan_model->detail_data($id);

        // check if the pemesanan exists before trying to delete it
        if(isset($pemesanan->id))
        {
          $this->Pemesanan_model->hapus_data($pemesanan->id);
          redirect('admin/pemesanan');
        }
        else
          show_error('Data pemesanan tidak ada');
    }

    function validasi($id)
    {
        // check if the pemesanan exists before trying to edit it
        $data['pemesanan'] = $this->Pemesanan_model->detail_data($id);

        if(isset($data['pemesanan']->id))
        {
            $params['status'] = 1;
            $this->Pemesanan_model->update_data($params, $id);
            redirect('admin/pemesanan');
        }
    }

    function nonvalidasi($id)
    {
        // check if the pemesanan exists before trying to edit it
        $data['pemesanan'] = $this->Pemesanan_model->detail_data($id);

        if(isset($data['pemesanan']->id))
        {
            $params['status'] = 2;
            $this->Pemesanan_model->update_data($params, $id);
            redirect('admin/pemesanan');
        }
    }

}

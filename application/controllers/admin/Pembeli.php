<?php

class Pembeli extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

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
     * Listing of pembeli
     */
    function index()
    {
        $data['pembeli'] = $this->User_model->data_pembeli();
     
        $data['_view'] = 'admin/pembeli/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new pembeli
     */
    function add()
    {
        
    }

    /*
     * Editing a Pembeli
     */
    function edit($idPembeli)
    {
        
    }

    /*
     * Deleting Pembeli
     */
    function hapus($id)
    {
        $pembeli = $this->User_model->detail_data($id);

        // check if the pembeli exists before trying to delete it
        if(isset($pembeli->id))
        {
          $this->User_model->hapus_data($pembeli->id);
          redirect('admin/pembeli');
        }
        else
          show_error('Data Pembeli tidak ada');
    }
}

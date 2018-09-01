<?php

class User extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

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
     * Show user
     */
    function index()
    {
        $data['user'] = $this->User_model->data_admin();

        $data['_view'] = 'admin/user/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new user
     */
    function tambah()
    {
        // $this->load->library('form_validation');

        // $this->form_validation->set_rules('nama','Nama User','max_length[100]');
        // $this->form_validation->set_rules('email','Email User','max_length[100]');
        // $this->form_validation->set_rules('password','Password User','max_length[20]');

        // if($this->form_validation->run())
        // {
        //     $params = array(
        //         'username' => $this->input->post('nama'),
        //         'first_name' => $this->input->post('nama'),
        //         'email' => $this->input->post('email'),
        //         'password' => md5($this->input->post('password')),
        //         'group_id' => 1,
        //         'active' => 1,
        //     );

        //     if (!empty($_FILES['gambar']['name'])) {
        //         $nama_gambar    = $this->upload_foto($this->input->post('nama'));
        //         $params['gambar'] = $nama_gambar;
        //     }
        //     $query = $this->User_model->input_data($params);
          
        //     redirect('admin/user');
        // }
        // else
        // {
        //     $data['_view'] = 'admin/user/add';
        //     $this->load->view('_layouts/admin/index',$data);
        // }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
        // $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');

        if ($identity_column !== 'email')
        {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }

        // $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        // $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
                'activation_code' => "",
                'group_id' => 1,
            );

            $group_id = array(
                'group_id' => 1,
            );
        }
        if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data, $group_id))
        {


            redirect('admin/user');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            // $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_user', $this->data);
            $this->data['_view'] = "admin/user/add";
            $this->_render_page('_layouts/admin/index', $this->data);
        }
    }

    /*
     * Editing a user
     */
    function edit($id)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->detail_data($id);

        if(isset($data['user']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name','Nama User','max_length[20]');
            $this->form_validation->set_rules('email','email User','max_length[20]');
            // $this->form_validation->set_rules('password','password User','max_length[20]');

            if($this->form_validation->run())
            {
                $params = array(
                    'first_name' => $this->input->post('first_name'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                );

                if (!empty($_FILES['gambar']['name'])) {
                    $nama_gambar    = $this->upload_foto($this->input->post('first_name'));
                    $params['gambar'] = $nama_gambar;
                }

                $this->User_model->update_data($params, $id);
                redirect('admin/user');
            }
            else
            {
                $data['_view'] = 'admin/user/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data User tidak ada');
    }
    
    /*
     * Deleting user
     */
    function hapus($id)
    {
        $user = $this->User_model->detail_data($id);

        // check if the user user exists before trying to delete it
        if(isset($user->id))
        {
          $this->User_model->hapus_data($user->id);
          redirect('admin/user');
        }
        else
          show_error('Data user tidak ada');
    }

    /*
     * fungsi upload gambar
     */
    function upload_foto($nama){
        $set_name   = $nama."-".RAND(0000,9999);
        $path       = $_FILES['gambar']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

        $config['upload_path']          = './upload/user/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 9024;
        $config['file_name']            = "$set_name".$extension;
        $this->load->library('upload', $config);
        // proses upload
        $upload = $this->upload->do_upload('gambar');

        if ($upload == FALSE) {
            $error = array('error' => $this->upload->display_errors());
            dump($error);
            dump('Gambar gagal diupload! Periksa gambar');
        }

        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function hapusgambar($id)
    {
        $user = $this->User_model->detail_data($id);

        // check if the user produk exists before trying to delete it
        if(isset($user->id))
        {
            unlink('upload/user/'.$user->gambar);
            $data['gambar'] = "";
            $this->User_model->update_data($data, $user->id);
            redirect('admin/user/edit/'.$id);
        }
        else
          show_error('Data user tidak ada');
    }

    public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        // This will return html on 3rd argument being true
        if ($returnhtml)
        {
            return $view_html;
        }
    }

}

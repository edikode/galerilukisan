<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->load->model('User_model');

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		// $this->lang->load('auth');
	}

	public function Daftar()
	{
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');

		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}

		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
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
				'group_id' => 2,
			);
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page

			$pembeli = $this->User_model->detail_aktivasi($email);
			// die($pembeli->email);
			$data_email = array(
                    'pembeli'   => $pembeli->first_name,
                    'pembeli_id'   => $pembeli->id,
                    'token'   	=> $pembeli->activation_code,
                );
            // kirim email
            $pesan = get_instance();
            $pesan->load->library('email');
            $config['protocol'] = "smtp";
            $config['mailpath'] = "/usr/sbin/sendmail";
            $config['smtp_host'] = "ssl://smtp.gmail.com";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "kursuswebid@gmail.com";
            $config['smtp_pass'] = "02111997edi";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            
            $pesan->email->initialize($config);
     
            $pesan->email->from('kursuswebid@gmail.com', 'lukisanstore');
            $pesan->email->to($pembeli->email,$pembeli->first_name);
            $pesan->email->subject('AKTIVASI PENDAFTARAN PELANGGAN');

            $body = $this->load->view('email/aktivasi',$data_email,TRUE);
            $pesan->email->message($body);

            if ($this->email->send()) 
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh');
            }
            else 
            {
                echo '<script type="text/javascript">alert("Email gagal terkirim");window.location.replace("'.base_url('user/daftar').'")</script>';
            }

			
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
			$this->data['last_name'] = array(
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
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
			$this->data['company'] = array(
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
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
			$this->data['_view'] = "auth/create_user";
			$this->_render_page('_layouts/login', $this->data);
		}
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
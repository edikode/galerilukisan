<?php

class Pembelian extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('DetailPembelian_model');
        $this->load->model('Pembelian_model');
        $this->load->model('Kategori_model');
        $this->load->model('Ukuran_model');
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
     * Show produk
     */
    function index()
    {
        $data['pembelian'] = $this->Pembelian_model->semua_data();

        $data['_view'] = 'admin/pembelian/index';
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
        $data['pembelian'] = $this->Pembelian_model->detail_data($id);

        if(isset($data['pembelian']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('status','Status','required|max_length[20]');

            if($this->form_validation->run())
            {
                $data_post = array(
                  'status' => $this->input->post('status'),
                );

                $this->Pembelian_model->update_data($data_post, $id);
                redirect('admin/pembelian');
            }
            else
            {
                $data['_view'] = 'admin/pembelian/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data Pembelian tidak ada');
    }
    
    /*
     * Deleting produk
     */
    function hapus($id)
    {
        $pembelian = $this->Pembelian_model->detail_data($id);

        // check if the pembelian exists before trying to delete it
        if(isset($pembelian->id))
        {
          $this->Pembelian_model->hapus_data($pembelian->id);
          redirect('admin/pembelian');
        }
        else
          show_error('Data pembelian tidak ada');
    }

    function validasi($id)
    {
        // check if the pembelian exists before trying to edit it
        $data = $this->Pembelian_model->detail_data($id);

        if(isset($data->id))
        {
            $pembeli = $this->User_model->detail_data($data->pembeli_id);

            $data_email = array(
                    'pembelian_id'   => $data->id,
                    'invoice'   => $data->invoice,
                    'tanggal'   => $data->tanggal,
                    'pembeli'   => $pembeli->first_name,
                    'total'     => $data->total
                );
            // kirim email
            $pesan = get_instance();
            $pesan->load->library('email');
            $config['protocol'] = "smtp";
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
            $pesan->email->subject('KONFIRMASI PEMBAYARAN SUKSES');

            $body = $this->load->view('email/validasi',$data_email,TRUE);
            $pesan->email->message($body);

            if ($this->email->send()) 
            {
                $params['status'] = 1;
                $this->Pembelian_model->update_data($params, $id);
                echo '<script type="text/javascript">alert("Validasi data sukses");window.location.replace("'.base_url('admin/pembelian').'")</script>';
            } 
            else 
            {
              echo '<script type="text/javascript">alert("Email gagal terkirim")</script>';
            }
        }
    }

    function nonvalidasi($id)
    {
         // check if the pembelian exists before trying to edit it
        $data = $this->Pembelian_model->detail_data($id);

        if(isset($data->id))
        {
            $pembeli = $this->User_model->detail_data($data->pembeli_id);

            $data_email = array(
                    'pembelian_id'   => $data->id,
                    'invoice'   => $data->invoice,
                    'tanggal'   => $data->tanggal,
                    'pembeli'   => $pembeli->first_name,
                    'total'     => $data->total
                );
            // kirim email
            $pesan = get_instance();
            $pesan->load->library('email');
            $config['protocol'] = "smtp";
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
            $pesan->email->subject('KONFIRMASI PEMBAYARAN GAGAL');

            $body = $this->load->view('email/nonvalidasi',$data_email,TRUE);
            $pesan->email->message($body);

            if ($this->email->send()) 
            {
                $params['status'] = 2;
                $this->Pembelian_model->update_data($params, $id);
                echo '<script type="text/javascript">alert("Data tidak valid berhasil dikonfirmasi");window.location.replace("'.base_url('admin/pembelian').'")</script>';
            }
            else 
            {
                echo '<script type="text/javascript">alert("Email gagal terkirim")</script>';
            }
            
        }
    }

    public function cetak($id)
    {
        $data['cetak'] = $this->Pembelian_model->detail_data($id);
        $data['pembeli'] = $this->User_model->detail_data($data['cetak']->pembeli_id);

        $this->load->view('pdf/bukti_pembayaran',$data);

        $html = $this->output->get_output();

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("Bukti Pembayaran.pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        // $this->dompdf->stream("Laporan_pembelian-".$bulan."-".$tahun.".pdf");

    }

}

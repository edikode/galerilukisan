<?php

class Produk extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ukuran_model');
        $this->load->model('Harga_model');
        $this->load->model('Kategori_model');
        $this->load->model('Produk_model');

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
        // $data['produk'] = $this->Produk_model->semua_data();
        $this->db->select('produk.*, kategori_produk.nama as kategori');
        $this->db->from('produk');
        $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');

        $data['produk'] = $this->db->get()->result();

        $data['_view'] = 'admin/produk/index';
        $this->load->view('_layouts/admin/index',$data);
    }

    /*
     * Adding a new produk
     */
    function tambah_stok($id)
    {
        $data['produk'] = $this->Produk_model->detail_data($id);

        if(isset($data['produk']->id))
        {
            $this->load->library('form_validation');

            $params = array(
                'stok' => $this->input->post('stok')+$data['produk']->stok,
            );

            $this->Produk_model->update_data($params, $id);
            redirect('admin/produk');
        }
    }

    function tambah()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','Nama Produk','max_length[20]');
        $this->form_validation->set_rules('harga','Harga Produk','numeric|max_length[20]');
        $this->form_validation->set_rules('ukuran','Ukuran Produk','max_length[20]');

        if($this->form_validation->run())
        {
            $ukuran_id = $this->input->post('ukuran_id');
            $kategori_id = $this->input->post('kategori_id');
            $data_harga = $this->Harga_model->cari_harga($ukuran_id,$kategori_id);
            $params = array(
                'nama' => $this->input->post('nama'),
                'link' => $this->fungsi->link($this->input->post('nama')),
                'teks' => $this->input->post('teks'),
                'kategori_id' => $kategori_id,
                'ukuran_id' => $ukuran_id,
                'harga' => $data_harga->harga,
                'tanggal' => date("Y-m-d")
            );

            if (!empty($_FILES['gambar']['name'])) {
                $nama_gambar    = $this->upload_foto($this->input->post('nama'));
                $params['gambar'] = $nama_gambar;
            }
            $query = $this->Produk_model->input_data($params);
          
            redirect('admin/produk');
        }
        else
        {
            $data['kategori'] = $this->Kategori_model->semua_data();
            $data['ukuran'] = $this->Ukuran_model->semua_data();
            $data['_view'] = 'admin/produk/add';
            $this->load->view('_layouts/admin/index',$data);
        }
    }

    /*
     * Editing a produk
     */
    function edit($id)
    {
        // check if the produk exists before trying to edit it
        $data['produk'] = $this->Produk_model->detail_data($id);

        if(isset($data['produk']->id))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama','Nama Produk','max_length[20]');
            $this->form_validation->set_rules('harga','Harga Produk','numeric|max_length[20]');
            $this->form_validation->set_rules('ukuran','Ukuran Produk','max_length[20]');

            if($this->form_validation->run())
            {
                $ukuran_id = $this->input->post('ukuran_id');
                $kategori_id = $this->input->post('kategori_id');
                $data_harga = $this->Harga_model->cari_harga($ukuran_id,$kategori_id);
                $params = array(
                    'nama' => $this->input->post('nama'),
                    'link' => $this->fungsi->ceklink($this->input->post('nama')),
                    'teks' => $this->input->post('teks'),
                    'kategori_id' => $kategori_id,
                    'ukuran_id' => $ukuran_id,
                    'harga' => $data_harga->harga,
                    'tanggal' => date("Y-m-d")
                );

                if (!empty($_FILES['gambar']['name'])) {
                    $nama_gambar    = $this->upload_foto($this->input->post('nama'));
                    $params['gambar'] = $nama_gambar;
                }

                $this->Produk_model->update_data($params, $id);
                redirect('admin/produk');
            }
            else
            {

                $data['kategori'] = $this->Kategori_model->semua_data();
                $data['ukuran'] = $this->Ukuran_model->semua_data();
                $data['_view'] = 'admin/produk/edit';
                $this->load->view('_layouts/admin/index',$data);
            }
        }
        else
            show_error('Data Produk tidak ada');
    }
    
    /*
     * Deleting produk
     */
    function hapus($id)
    {
        $produk = $this->Produk_model->detail_data($id);

        // check if the produk produk exists before trying to delete it
        if(isset($produk->id))
        {
          $this->Produk_model->hapus_data($produk->id);
          redirect('admin/produk');
        }
        else
          show_error('Data Produk tidak ada');
    }

    function hapusgambar($id)
    {
        $produk = $this->Produk_model->detail_data($id);

        // check if the produk produk exists before trying to delete it
        if(isset($produk->id))
        {
            unlink('upload/produk/'.$produk->gambar);
            $data['gambar'] = "";
            $this->Produk_model->update_data($data, $produk->id);
            redirect('admin/produk/edit/'.$id);
        }
        else
          show_error('Data Produk tidak ada');
    }

    /*
     * fungsi upload gambar
     */
    function upload_foto($nama){
        $set_name   = $nama."-".RAND(0000,9999);
        $path       = $_FILES['gambar']['name'];
        $extension  = ".".pathinfo($path, PATHINFO_EXTENSION);

        $config['upload_path']          = './upload/produk/';
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

}

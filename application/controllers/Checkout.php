<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('DetailPembelian_model');
		$this->load->model('Pemesanan_model');
		$this->load->model('Pembelian_model');
		$this->load->model('Kategori_model');
		$this->load->model('Ukuran_model');
		$this->load->model('Profil_model');
		$this->load->model('Artikel_model');
		$this->load->model('User_model');
		$this->load->model('Produk_model');


        if ($this->ion_auth->is_admin())
		{
			return show_error('Halaman ini hanya dapat diakses oleh pelanggan');
		} 
		else if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
	}

	public function index()
	{

		//ambil data
		$user = $this->ion_auth->user()->row();

		$provinsi 	= explode(",", $this->input->post('prov', TRUE));
		$kabupaten 	= explode(",", $this->input->post('kota', TRUE));
		$layanan 	= explode(",", $this->input->post('layanan', TRUE));
		$alamat 	= $this->input->post('alamat', TRUE);
		$kode_pos	= $this->input->post('kode_pos', TRUE);
		$kurir 		= $this->input->post('kurir', TRUE);
		$ongkir 	= $this->input->post('ongkir', TRUE);
		$total 		= $this->input->post('total', TRUE);
		$tanggal 	= date("Y-m-d");
		$bts 		= date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));

		if($this->input->post('kategori', TRUE) == "pemesanan"){
			
			$pemesanan = $this->Pemesanan_model->detail_data($this->input->post('pemesanan_id', TRUE));
			$data = array(
				'invoice'	=> RAND(0000,9999),
				'tanggal' 	=> $tanggal,
				'pembeli_id' => $user->id,
				'provinsi' 	=> $provinsi[1],
				'kabupaten' => $kabupaten[1],
				'alamat' 	=> $alamat,
				'kode_pos' 	=> $kode_pos,
				'kurir' 	=> $kurir,
				'layanan' 	=> $layanan[1],
				'ongkir' 	=> $ongkir,
				'total' 	=> $total,
				'jumlah' 	=> $pemesanan->jumlah,
				'harga' 	=> $pemesanan->harga,
				'ukuran_id' 	=> $pemesanan->ukuran_id,
				'kategori_id' 	=> $pemesanan->kategori_id,
				'status' 	=> '0'
			);

		} else {
			$data = array(
				'invoice'	=> RAND(0000,9999),
				'tanggal' 	=> $tanggal,
				'pembeli_id' => $user->id,
				'provinsi' 	=> $provinsi[1],
				'kabupaten' => $kabupaten[1],
				'alamat' 	=> $alamat,
				'kode_pos' 	=> $kode_pos,
				'kurir' 	=> $kurir,
				'layanan' 	=> $layanan[1],
				'ongkir' 	=> $ongkir,
				'total' 	=> $total,
				'status' 	=> '0'
			);
		}

		if($this->input->post('kategori', TRUE) == "pemesanan"){

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
	        $pesan->email->to($user->email,$user->first_name);
	        $pesan->email->subject('INVOICE PEMESANAN LUKISAN');

	        $body = $this->load->view('email/pesan',$data,TRUE);
	        $pesan->email->message($body);

        	if ($this->email->send()) 
			{
				$this->Pemesanan_model->update_data($data,$this->input->post('pemesanan_id', TRUE));
				echo '<script type="text/javascript">alert("Silahkan cek email anda untuk detail pembayaran...");window.location.replace("'.base_url('pembayaran').'")</script>';
			} 
			else 
			{
			  echo '<script type="text/javascript">alert("Gagal mengirimkan email");window.location.replace("'.base_url('beli/checkout').'")</script>';
			}

			
		} else {

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
	        $pesan->email->to($user->email,$user->first_name);
	        $pesan->email->subject('INVOICE PEMBELIAN LUKISAN');

	        $body = $this->load->view('email/beli',$data,TRUE);
	        $pesan->email->message($body);
	        
        	if ($this->email->send()) 
			{
				$this->Pembelian_model->input_data($data);
				$pemesanan_id = $this->db->insert_id();

				foreach($this->cart->contents() as $detail){
					$produk = $this->Produk_model->detail_data($detail['id']);

					$params['stok'] = $produk->stok - $detail['qty'];
					$this->Produk_model->update_data($params, $produk->id);

					$detail = array(
							'jumlah' => $detail['qty'],
							'subtotal' => $detail['price']*$detail['qty'],
							'produk_id' => $detail['id'],
							'pemesanan_id' => $pemesanan_id,
						);
					$this->DetailPembelian_model->input_data($detail);
				}

	       		$this->cart->destroy();

				echo '<script type="text/javascript">alert("Silahkan cek email anda untuk detail pembayaran...");window.location.replace("'.base_url('pembayaran').'")</script>';
			} 
			else 
			{
			  echo '<script type="text/javascript">alert("Gagal mengirimkan email");window.location.replace("'.base_url('beli/checkout').'")</script>';
			}
		}
	}

   	public function city()
   	{
      	$prov = $this->input->get('prov', TRUE);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$prov",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 563b6d1fe883cc55cb374d08692ab9e0"
		  ),
		));
		 
		$response = curl_exec($curl);
		$err = curl_error($curl);
		 
		curl_close($curl);
		 
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
		}
		 
		$data = json_decode($response, true);
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
		    echo '<option value="'.$data['rajaongkir']['results'][$i]['city_id'].','.$data['rajaongkir']['results'][$i]['city_name'].'">'.$data['rajaongkir']['results'][$i]['city_name'].'</option>';
		}
   }

	public function getcost($id)
	{
		$asal = 42;
		$dest = $this->input->get('dest', TRUE);
		$kurir = $this->input->get('kurir', TRUE);

		if(isset($id) && $id != "salah"){
			$pemesanan = $this->Pemesanan_model->detail_data($id);
			$ukuran = $this->Ukuran_model->detail_data($pemesanan->ukuran_id);
			$berat = $ukuran->berat*1000;
		} else {
			foreach ($this->cart->contents() as $key) {
				$berat += ($key['weight']*1000 * $key['qty']);
			}
		}
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=$asal&destination=$dest&weight=$berat&courier=$kurir",
		  // CURLOPT_POSTFIELDS => "origin=50&destination=114&weight=1700&courier=jne",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: 7df3af2c30f429201b702d80a6ce5ae2"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $data = json_decode($response, TRUE);

		  echo '<option value="" selected disabled>Layanan yang tersedia</option>';

		  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {

				for ($l=0; $l < count($data['rajaongkir']['results'][$i]['costs']); $l++) {

					echo '<option value="'.$data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['value'].','.$data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')">';
					echo $data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')</option>';

				}

		  }
		}
	}

	public function cost($id)
	{
		if(isset($id) && $id != "salah"){
			$pemesanan = $this->Pemesanan_model->detail_data($id);
			$biaya = explode(',', $this->input->get('layanan', TRUE));
			$total = $pemesanan->harga + $biaya[0];
		} else {
			$biaya = explode(',', $this->input->get('layanan', TRUE));
			$total = $this->cart->total() + $biaya[0];
		}

		echo $biaya[0].','.$total;
	}
}

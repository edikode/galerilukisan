<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Fungsi
 */
class fungsi extends CI_Model
{
	function __construct()
    {
        $this->load->model('Pembelian_model');
        $this->load->model('Pemesanan_model');
        $this->load->model('User_model');
    }

	function nama_pembeli($id)
    {
        $query =  $this->User_model->detail_data($id);
        return $query->first_name;
    }

    function pembelian_baru()
    {
        $query =  $this->Pembelian_model->pembelian_baru();
        return $query;
    }

    function pemesanan_baru()
    {
        $query =  $this->Pemesanan_model->pemesanan_baru();
        return $query;
    }

	// buat link
	function link($s) {
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','<','>');
		$s = strtolower($s);
		$s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d    
		$s = str_replace('  ', ' ', $s); // Ganti dobel spasi dengan tanda -
		$s = str_replace(' ', '-', $s); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
		
		return $s;
	}

	function ceklink($c) {    
		$b = array ('/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','<','>');
		$c = strtolower($c);
		$c = str_replace($b, '', $c);
		$c = str_replace('  ', '', $c);
		$c = str_replace(' ', '-', $c);
		return $c;
	}

	function potong_kalimat($kalimat) {
	    $teks = strip_tags($kalimat);
	    $teks = substr($teks,0,300);
	    $teks = substr($teks,0,strrpos($teks," "));

	    return $teks;
	}
							
	function jam($clock){
		//$waktu = substr($clock,6,2);
		$menit = substr($clock,3,2);
		$jam = substr($clock,0,2);
		//if ($waktu == "PM"){
			//$jam2 = $jam + 12;
		//}
		// return $jam.':'.$menit.' WIB';		 
		return $jam.':'.$menit;		 
	}

	//buat tanggal
	public function getBulan_id($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}

	public function tanggal_id($tanggal){
		//potong 
		$tanggal2 = substr($tanggal,8,2);
		$bulan = $this->getBulan_id(substr($tanggal,5,2));
		$tahun = substr($tanggal,0,4);
		return $tanggal2.' '.$bulan.' '.$tahun;		 
	}

	

	function tanggal_en($tanggal){
		$tanggal2 = substr($tanggal,8,2);
		$bulan = getBulan_en(substr($tanggal,5,2));
		$tahun = substr($tanggal,0,4);
		return $bulan.', '.$tanggal2.' '.$tahun;		 
	}

	function getBulan_en($bln){
		switch ($bln){
			case 1: 
				return "January";
				break;
			case 2:
				return "February";
				break;
			case 3:
				return "March";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "May";
				break;
			case 6:
				return "June";
				break;
			case 7:
				return "July";
				break;
			case 8:
				return "August";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "October";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "December";
				break;
		}
	}

	function tgl($tgl){
		$tanggal1 = substr($tgl,8,2);	
		return $tanggal1;		 
	}

	function bln_id($bln2){	
		$bulan2 = getBln_id(substr($bln2,5,2));	
		return $bulan2;		 
	}

	function bln_en($bln2){	
		$bulan2 = getBln_en(substr($bln2,5,2));	
		return $bulan2;		 
	}

	function thn($bln2){	
		$tahun = substr($bln2,0,4);	
		return $tahun;		 
	}

	function getBln_id($bln3){
		switch ($bln3){
			case 1: 
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Agu";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}

	function getBln_en($bln3){
		switch ($bln3){
			case 1: 
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "May";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Aug";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Oct";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Dec";
				break;
		}
	}

	function rupiah($angka){
		$rupiah=number_format($angka,0,',','.');
		return $rupiah;
	}
}

?>

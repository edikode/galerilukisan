<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta'); 

class Pembelian_model extends CI_Model
{
    function __construct()
    {
        $this->table = "pembelian";
        $this->order = 'DESC';
        parent::__construct();
    }

    function jumlah()
    {
        $query =  $this->db->get($this->table);
        return $query->num_rows();
    }

    function pembelian_baru()
    {
        $query =  $this->db->get_where($this->table, array('status' => 0));
        return $query->result();
    }

    function data_laporan($keyword = NULL, $bulan, $tahun) {

        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('month(tanggal)',$bulan);
        $this->db->where('year(tanggal)',$tahun);
        $this->db->where("status != '0'");
        $this->db->where("(alamat  LIKE '%{$keyword}%' or provinsi  LIKE '%{$keyword}%' or kabupaten  LIKE '%{$keyword}%')");
        $this->db->order_by('tanggal', $this->order);
        
        $query = $this->db->get();
        return $query->result();
    }

    function semua_data()
    {
        $query =  $this->db->order_by('id', 'DESC')->get($this->table);
        return $query->result();
    }

    function detail_data($id)
    {
        $query =  $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    function detail_front($pembeli_id)
    {
        $query =  $this->db->order_by('id', 'DESC')->get_where($this->table, array('pembeli_id' => $pembeli_id));
        return $query->result();
    }

    function input_data($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update_data($data, $id_data)
    {
        $this->db->where('id', $id_data);
        $this->db->update($this->table, $data);
    }

    function hapus_data($id_data)
    {
        $this->db->where('id', $id_data);
        $this->db->delete($this->table);
    }

}

?>
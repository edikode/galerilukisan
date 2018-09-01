<?php

class Harga_model extends CI_Model
{
    function __construct()
    {
        $this->table = "l_harga";
        parent::__construct();
    }

    function semua_data()
    {
        $query =  $this->db->get($this->table);
        return $query->result();
    }

    function detail_data($id)
    {
        $query =  $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    function cari_harga($ukuran,$kategori)
    {
        $query =  $this->db->get_where($this->table, array('ukuran_id' => $ukuran,'kategori_id' => $kategori));
        return $query->row();
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
<?php

class Artikel_model extends CI_Model
{
    function __construct()
    {
        $this->table = "artikel";
        parent::__construct();
    }

    function jml_data()
    {
        $query = $this->db->get($this->table);
        $total = $query->num_rows();
        return $total;
    }

    function data_pag($limit,$start)
    {
        $query =  $this->db->get($this->table, $limit, $start);
        return $query->result();
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

    function detail_front($link)
    {
        $query =  $this->db->get_where($this->table, array('link' => $link));
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
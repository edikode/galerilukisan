<?php

class User_model extends CI_Model
{
    function __construct()
    {
        $this->table = "users";
        parent::__construct();
    }

    function data_admin()
    {
        $query =  $this->db->get_where($this->table, array('group_id' => 1));
        return $query->result();
    }

    function data_pembeli()
    {
        $query =  $this->db->get_where($this->table, array('group_id' => 2));
        return $query->result();
    }

    function detail_data($id)
    {
        $query =  $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    function detail_aktivasi($email)
    {
        $query =  $this->db->get_where($this->table, array('email' => $email,'group_id' => 2));
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
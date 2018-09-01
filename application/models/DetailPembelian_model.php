<?php

class DetailPembelian_model extends CI_Model
{
    function __construct()
    {
        $this->table = "detailpembelian";
        parent::__construct();
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

    function detail_pembelian($pembelian_id)
    {
        $this->db->select('d.jumlah, d.subtotal, produk.*');
        $this->db->from('detailpembelian as d');
        $this->db->join('produk', 'd.produk_id = produk.id');
        $this->db->where("d.pemesanan_id = '".$pembelian_id."'");

        $query = $this->db->get()->result();
        return $query;
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
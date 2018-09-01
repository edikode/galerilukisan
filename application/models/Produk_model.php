<?php

class Produk_model extends CI_Model
{
    function __construct()
    {
        $this->table = "produk";
        parent::__construct();
    }

    function jml_data()
    {
        $this->db->select('produk.*, kategori_produk.nama as kategori');
        $this->db->from('produk');
        $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
        $this->db->where("produk.stok > 0");
        
        $query = $this->db->get();
        $total = $query->num_rows();
        return $total;
    }

    function jml_data_pag($kategori)
    {
        $this->db->select('produk.*, kategori_produk.nama as kategori');
        $this->db->from('produk');
        $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
        $this->db->where("(kategori_produk.link  LIKE '%{$kategori}%')");
        $this->db->where("produk.stok > 0");
        
        $query = $this->db->get();
        $total = $query->num_rows();
        return $total;
    }

    function data_pag_semua($limit,$start)
    {
        $this->db->select('produk.*, kategori_produk.nama as kategori');
        $this->db->from('produk');
        $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
        $this->db->where("produk.stok > 0");
        $this->db->limit($limit, $start);
        
        $query = $this->db->get();
        return $query->result();
    }

    function data_pag($limit,$start,$kategori)
    {
        $this->db->select('produk.*, kategori_produk.nama as kategori');
        $this->db->from('produk');
        $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
        $this->db->where("(kategori_produk.link  LIKE '%{$kategori}%')");
        $this->db->where("produk.stok > 0");
        $this->db->limit($limit, $start);
        
        $query = $this->db->get();
        return $query->result();
    }

    function semua_data()
    {
        $query =  $this->db->get($this->table);
        return $query->result();
    }

    function data_laporan($filter,$keyword)
    {
        
        if($filter == "nama"){
            $this->db->select('produk.*, kategori_produk.nama as kategori');
            $this->db->from('produk');
            $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
            $this->db->where("(produk.nama  LIKE '%{$keyword}%')");

        } elseif($filter == "kategori"){
            $this->db->select('produk.*, kategori_produk.nama as kategori');
            $this->db->from('produk');
            $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
            $this->db->where("(kategori_produk.nama  LIKE '%{$keyword}%')");

        } elseif($filter == "ukuran"){

            if($keyword != ""){
                $this->db->select('*');
                $this->db->from('l_ukuran');
                $this->db->where("(ukuran LIKE '%{$keyword}%')");
                $data_ukuran = $this->db->get()->row();
                
                $this->db->select('produk.*, kategori_produk.nama as kategori');
                $this->db->from('produk');
                $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
                $this->db->where("produk.ukuran_id = '$data_ukuran->id'");

            } else {
                $this->db->select('produk.*, kategori_produk.nama as kategori');
                $this->db->from('produk');
                $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
            }
            
        } else {
            $this->db->select('produk.*, kategori_produk.nama as kategori');
            $this->db->from('produk');
            $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
        }
        
        $query = $this->db->get();

        return $query->result();
    }

    function laporan_stok($filter)
    {
        
        if($filter == "ada"){
            $this->db->select('produk.*, kategori_produk.nama as kategori');
            $this->db->from('produk');
            $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
            $this->db->where("(produk.stok  > 0)");

        } elseif($filter == "kosong"){
            $this->db->select('produk.*, kategori_produk.nama as kategori');
            $this->db->from('produk');
            $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
            $this->db->where("(produk.stok  = 0)");

        } else {
            $this->db->select('produk.*, kategori_produk.nama as kategori');
            $this->db->from('produk');
            $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
        }
        
        $query = $this->db->get();

        return $query->result();
    }

    function produk_minimal($batas)
    {
        $this->db->limit($batas);
        return $this->db->get($this->table)->result();
    }

    function detail_data($id)
    {
        $query =  $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }

    function detail_front($link)
    {
        $this->db->select('produk.*, kategori_produk.nama as kategori');
        $this->db->from('produk');
        $this->db->join('kategori_produk', 'produk.kategori_id = kategori_produk.id');
        $this->db->where("produk.link = '".$link."'");

        $query = $this->db->get()->row();
        return $query;
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
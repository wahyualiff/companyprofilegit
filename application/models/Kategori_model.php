<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing kategori
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('urutan', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail kategori
    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori');
        $query = $this->db->get();
        return $query->row();
    }

    // Read kategori
    public function read($slug_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('slug_kategori', $slug_kategori);
        $this->db->order_by('id_kategori');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data
    public function tambah($data)
    {
        $this->db->insert('kategori', $data);
    }

    // Edit data kategori
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }

    // Delete data kategori
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori', $data);
    }
}

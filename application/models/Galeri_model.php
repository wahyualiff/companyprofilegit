<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{
    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing galeri
    public function listing()
    {
        $this->db->select('galeri.*,user.nama');
        $this->db->from('galeri');
        // Join
        $this->db->join('user', 'user.id_user = galeri.id_user', 'LEFT');
        // end join
        $this->db->order_by('id_galeri', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing slider
    public function slider()
    {
        $this->db->select('galeri.*,user.nama');
        $this->db->from('galeri');
        // Join
        $this->db->join('user', 'user.id_user = galeri.id_user', 'LEFT');
        // end join
        $this->db->where('posisi_galeri', 'Homepage');
        $this->db->order_by('id_galeri', 'ASC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    // Detail galeri
    public function detail($id_galeri)
    {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->where('id_galeri', $id_galeri);
        $this->db->order_by('id_galeri');
        $query = $this->db->get();
        return $query->row();
    }

    // Login galeri
    public function login($galeriname, $password)
    {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->where(array(
            'galeriname'      => $galeriname,
            'password'      => sha1($password)
        ));
        $this->db->order_by('id_galeri');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data
    public function tambah($data)
    {
        $this->db->insert('galeri', $data);
    }

    // Edit data galeri
    public function edit($data)
    {
        $this->db->where('id_galeri', $data['id_galeri']);
        $this->db->update('galeri', $data);
    }

    // Delete data galeri
    public function delete($data)
    {
        $this->db->where('id_galeri', $data['id_galeri']);
        $this->db->delete('galeri', $data);
    }
}

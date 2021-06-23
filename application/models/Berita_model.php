<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing berita
    public function listing()
    {
        $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
        $this->db->from('berita');
        // Join
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
        // end join
        $this->db->order_by('id_berita', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing berita home
    public function home()
    {
        $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
        $this->db->from('berita');
        // Join
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
        // end join
        $this->db->where(array(
            'status_berita'      => 'Publish',
            'jenis_berita'      => 'Berita'
        ));
        $this->db->order_by('id_berita', 'DESC');
        $this->db->limit(9);
        $query = $this->db->get();
        return $query->result();
    }

    // Listing berita mainpage
    public function berita($limit, $start)
    {
        $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
        $this->db->from('berita');
        // Join
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
        // end join
        $this->db->where(array(
            'status_berita'      => 'Publish'
        ));
        $this->db->order_by('id_berita', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    // Total berita mainpage
    public function total()
    {
        $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
        $this->db->from('berita');
        // Join
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
        // end join
        $this->db->where(array(
            'status_berita'      => 'Publish'
        ));
        $this->db->order_by('id_berita', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Listing kategori berita mainpage
    public function berita_kategori($id_kategori, $limit, $start)
    {
        $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
        $this->db->from('berita');
        // Join
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
        // end join
        $this->db->where(array(
            'status_berita'         => 'Publish',
            'berita.id_kategori'    => $id_kategori
        ));
        $this->db->order_by('id_berita', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    // Total kategori berita mainpage
    public function total_kategori($id_kategori)
    {
        $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
        $this->db->from('berita');
        // Join
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
        // end join
        $this->db->where(array(
            'status_berita'         => 'Publish',
            'berita.id_kategori'    => $id_kategori
        ));
        $this->db->order_by('id_berita', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Read kategori berita mainpage
    public function read($slug_berita)
    {
        $this->db->select('berita.*, kategori.nama_kategori, kategori.slug_kategori, user.nama');
        $this->db->from('berita');
        // Join
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
        // end join
        $this->db->where(array(
            'status_berita'         => 'Publish',
            'berita.slug_berita'    => $slug_berita
        ));
        $this->db->order_by('id_berita', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail berita
    public function detail($id_berita)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_berita', $id_berita);
        $this->db->order_by('id_berita');
        $query = $this->db->get();
        return $query->row();
    }

    // Login berita
    public function login($beritaname, $password)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where(array(
            'beritaname'      => $beritaname,
            'password'      => sha1($password)
        ));
        $this->db->order_by('id_berita');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data
    public function tambah($data)
    {
        $this->db->insert('berita', $data);
    }

    // Edit data berita
    public function edit($data)
    {
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->update('berita', $data);
    }

    // Delete data berita
    public function delete($data)
    {
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->delete('berita', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing user
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail user
    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->row();
    }

    // Login user
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(
            'username'      => $username,
            'password'      => sha1($password)
        ));
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data
    public function tambah($data)
    {
        $this->db->insert('user', $data);
    }

    // Edit data user
    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }

    // Delete data user
    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user', $data);
    }
}

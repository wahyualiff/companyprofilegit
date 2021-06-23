<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Check_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    // Cek login
    public function check()
    {
        if (
            $this->CI->session->userdata('username') == "" &&
            $this->CI->session->userdata('akses_level') == ""
        ) {
            $this->CI->session->set_flashdata('sukses', 'Anda belum login');
            redirect(base_url('login'), 'refresh');
        }
    }

    // Cek logout
    public function logout()
    {
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('akses_level');
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect(base_url('login'), 'refresh');
    }
}

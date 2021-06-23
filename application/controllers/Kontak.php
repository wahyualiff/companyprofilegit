<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }

    // Main page - Kontakpage
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        $data = array(
            'title'         => 'Kontak ' . $konfigurasi->namaweb . ' - ' . $konfigurasi->tagline,
            'keywords'      => 'Kontak ' . $konfigurasi->namaweb . ' - ' . $konfigurasi->tagline,
            'deskripsi'     => 'Kontak ' . $konfigurasi->namaweb . ' - ' . $konfigurasi->tagline,
            'konfigurasi'   => $konfigurasi,
            'isi'           => 'kontak/list'
        );
        $this->load->view('layout/wrapper', $data, false);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->model('kategori_model');
    }

    // Main page - Berita
    public function index()
    {
        $konfigurasi    = $this->konfigurasi_model->listing();
        // Listing berita dengan pagination
        $this->load->library('pagination');

        $config['base_url']     = base_url('berita/index/');
        $config['total_rows']   = count($this->berita_model->total());
        $config['per_page']     = 12;
        $config['uri_segment']  = 3;
        // Limit dan start
        $limit                  = $config['per_page'];
        $start                  = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
        //  End limit dan start

        $this->pagination->initialize($config);

        $berita                 = $this->berita_model->berita($limit, $start);
        // End listing berita dengan pagination

        $data = array(
            'title'      => 'Berita - ' . $konfigurasi->namaweb,
            'deskripsi'  => 'Berita - ' . $konfigurasi->namaweb,
            'keywords'   => 'Berita - ' . $konfigurasi->namaweb,
            'paginasi'   => $this->pagination->create_links(),
            'berita'     => $berita,
            'limit'      => $limit,
            'total'      => $config['total_rows'],
            'isi'        => 'berita/list'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    //  Kategori Berita
    public function kategori($slug_kategori)
    {
        $kategori       = $this->kategori_model->read($slug_kategori);
        $id_kategori    = $kategori->id_kategori;
        $konfigurasi    = $this->konfigurasi_model->listing();
        // Listing berita dengan pagination
        $this->load->library('pagination');

        $config['base_url']     = base_url('berita/kategori/' . $slug_kategori . '/index/');
        $config['total_rows']   = count($this->berita_model->total_kategori($id_kategori));
        $config['per_page']     = 12;
        $config['uri_segment']  = 5;
        // Limit dan start
        $limit                  = $config['per_page'];
        $start                  = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;
        //  End limit dan start

        $this->pagination->initialize($config);

        $berita                 = $this->berita_model->berita_kategori($id_kategori, $limit, $start);
        // End listing berita dengan pagination

        $data = array(
            'title'      => 'Kategori Berita: ' . $kategori->nama_kategori,
            'deskripsi'  => 'Kategori Berita: ' . $kategori->nama_kategori,
            'keywords'   => 'Kategori Berita: ' . $kategori->nama_kategori,
            'paginasi'   => $this->pagination->create_links(),
            'berita'     => $berita,
            'limit'      => $limit,
            'total'      => $config['total_rows'],
            'isi'        => 'berita/list'
        );
        $this->load->view('layout/wrapper', $data, false);
    }

    // Detail page berita
    public function read($slug_berita)
    {
        $berita    = $this->berita_model->read($slug_berita);
        $listing   = $this->berita_model->home();

        $data = array(
            'title'     => $berita->judul_berita,
            'deskripsi' => $berita->judul_berita,
            'keywords'  => $berita->judul_berita,
            'berita'    => $berita,
            'listing'   => $listing,
            'isi'       => 'berita/read'
        );
        $this->load->view('layout/wrapper', $data, false);
    }
}

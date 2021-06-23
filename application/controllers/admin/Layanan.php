<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('layanan_model');
    }

    // Main page - Layananpage
    public function index()
    {
        $layanan = $this->layanan_model->listing();

        $data = array(
            'title'  => 'Data Layanan Administrator (' . count($layanan) . ')',
            'layanan'   => $layanan,
            'isi'    => 'admin/layanan/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Tambah layanan
    public function tambah()
    {
        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_layanan',
            'Judul Layanan',
            'required',
            array('required'            => '%s harus diisi')
        );
        $valid->set_rules(
            'isi_layanan',
            'Isi Layanan',
            'required',
            array('required'            => '%s harus diisi')
        );

        if ($valid->run()) {
            $config['upload_path']          = './assets/upload/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000; // Kb
            $config['max_width']            = 5000; // Px
            $config['max_height']           = 5000; // Px

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                // End Validasi
                $data = array(
                    'title'         => 'Tambah Layanan',
                    'error_upload'  => $this->upload->display_errors(),
                    'isi'           => 'admin/layanan/tambah'
                );
                $this->load->view('admin/layout/wrapper', $data, false);

                // Masuk database
            } else {
                // Proses manipulasi gambar
                $upload_data     = array('uploads' => $this->upload->data());
                // Gambar asli disimpan di folder assets/upload/image
                // Gambar asli di copy untuk versi mini size ke folder assets/upload/image/thumbs
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/' . $upload_data['uploads']['file_name'];
                // Gambar versi kecil dipindahkan
                $config['new_image']        = './assets/upload/image/thumbs/' . $upload_data['uploads']['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 200;
                $config['height']           = 200;
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                $i = $this->input;
                $data = array(
                    'id_user'            => $this->session->userdata('id_user'),
                    'slug_layanan'       => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
                    'judul_layanan'      => $i->post('judul_layanan'),
                    'isi_layanan'        => $i->post('isi_layanan'),
                    'harga'              => $i->post('harga'),
                    'gambar'             => $upload_data['uploads']['file_name'],
                    'status_layanan'     => $i->post('status_layanan'),
                    'keywords'           => $i->post('keywords'),
                    'tanggal_post'       => date('Y-m-d H:i:s')
                );
                $this->layanan_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah');
                redirect(base_url('admin/layanan'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title'         => 'Tambah Layanan',
            'isi'           => 'admin/layanan/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Edit layanan
    public function edit($id_layanan)
    {
        $layanan = $this->layanan_model->detail($id_layanan);

        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_layanan',
            'Judul Layanan',
            'required',
            array('required'            => '%s harus diisi')
        );
        $valid->set_rules(
            'isi_layanan',
            'Isi Layanan',
            'required',
            array('required'            => '%s harus diisi')
        );

        if ($valid->run()) {
            // Jika tidak mengganti gambar
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']          = './assets/upload/image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; // Kb
                $config['max_width']            = 5000; // Px
                $config['max_height']           = 5000; // Px

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    // End Validasi
                    $data = array(
                        'title'         => 'Edit Layanan',
                        'layanan'        => $layanan,
                        'error_upload'  => $this->upload->display_errors(),
                        'isi'           => 'admin/layanan/edit'
                    );
                    $this->load->view('admin/layout/wrapper', $data, false);

                    // Masuk database
                } else {
                    // Proses manipulasi gambar
                    $upload_data     = array('uploads' => $this->upload->data());
                    // Gambar asli disimpan di folder assets/upload/image
                    // Gambar asli di copy untuk versi mini size ke folder assets/upload/image/thumbs
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/' . $upload_data['uploads']['file_name'];
                    // Gambar versi kecil dipindahkan
                    $config['new_image']        = './assets/upload/image/thumbs/' . $upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 200;
                    $config['height']           = 200;
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

                    $i = $this->input;

                    // Hapus gambar lama jika ada upload gambar baru
                    if ($layanan->gambar != "") {
                        unlink('./assets/upload/image/' . $layanan->gambar);
                        unlink('./assets/upload/image/thumbs/' . $layanan->gambar);
                    }
                    // End hapus gambar

                    $data = array(
                        'id_layanan'         => $id_layanan,
                        'id_user'            => $this->session->userdata('id_user'),
                        'slug_layanan'       => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
                        'judul_layanan'      => $i->post('judul_layanan'),
                        'isi_layanan'        => $i->post('isi_layanan'),
                        'harga'              => $i->post('harga'),
                        'gambar'             => $upload_data['uploads']['file_name'],
                        'status_layanan'     => $i->post('status_layanan'),
                        'keywords'           => $i->post('keywords')
                    );
                    $this->layanan_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/layanan'), 'refresh');
                }
            } else {
                // Update layanan tanpa ganti gambar baru
                $i = $this->input;
                $data = array(
                    'id_layanan'         => $id_layanan,
                    'id_user'            => $this->session->userdata('id_user'),
                    'slug_layanan'       => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
                    'judul_layanan'      => $i->post('judul_layanan'),
                    'isi_layanan'        => $i->post('isi_layanan'),
                    'harga'              => $i->post('harga'),
                    // 'gambar'             => $upload_data['uploads']['file_name'],
                    'status_layanan'     => $i->post('status_layanan'),
                    'keywords'           => $i->post('keywords')
                );
                $this->layanan_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/layanan'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title'         => 'Edit Layanan',
            'layanan'        => $layanan,
            'isi'           => 'admin/layanan/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Delete
    public function delete($id_layanan)
    {
        // Proteksi delete
        $this->check_login->check();

        $layanan = $this->layanan_model->detail($id_layanan);

        // Hapus gambar
        if ($layanan->gambar != "") {
            unlink('./assets/upload/image/' . $layanan->gambar);
            unlink('./assets/upload/image/thumbs/' . $layanan->gambar);
        }
        // End hapus gambar
        $data = array('id_layanan'     => $layanan->id_layanan);
        $this->layanan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/layanan'), 'refresh');
    }
}

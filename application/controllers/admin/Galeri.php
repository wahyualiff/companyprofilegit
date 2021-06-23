<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('galeri_model');
    }

    // Main page - Galeripage
    public function index()
    {
        $galeri = $this->galeri_model->listing();

        $data = array(
            'title'  => 'Data Galeri Administrator (' . count($galeri) . ')',
            'galeri'   => $galeri,
            'isi'    => 'admin/galeri/list'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Tambah galeri
    public function tambah()
    {
        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_galeri',
            'Judul Galeri',
            'required',
            array('required'            => '%s harus diisi')
        );
        $valid->set_rules(
            'isi_galeri',
            'Isi Galeri',
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
                    'title'         => 'Tambah Galeri',
                    'error_upload'  => $this->upload->display_errors(),
                    'isi'           => 'admin/galeri/tambah'
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
                    'id_user'           => $this->session->userdata('id_user'),
                    'judul_galeri'      => $i->post('judul_galeri'),
                    'isi_galeri'        => $i->post('isi_galeri'),
                    'website'           => $i->post('website'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                    'posisi_galeri'     => $i->post('posisi_galeri'),
                    'tanggal_post'      => date('Y-m-d H:i:s')
                );
                $this->galeri_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data telah ditambah');
                redirect(base_url('admin/galeri'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title'         => 'Tambah Galeri',
            'isi'           => 'admin/galeri/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Edit galeri
    public function edit($id_galeri)
    {
        $galeri = $this->galeri_model->detail($id_galeri);

        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_galeri',
            'Judul Galeri',
            'required',
            array('required'            => '%s harus diisi')
        );
        $valid->set_rules(
            'isi_galeri',
            'Isi Galeri',
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
                        'title'         => 'Edit Galeri',
                        'galeri'        => $galeri,
                        'error_upload'  => $this->upload->display_errors(),
                        'isi'           => 'admin/galeri/edit'
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
                    if ($galeri->gambar != "") {
                        unlink('./assets/upload/image/' . $galeri->gambar);
                        unlink('./assets/upload/image/thumbs/' . $galeri->gambar);
                    }
                    // End hapus gambar

                    $data = array(
                        'id_galeri'         => $id_galeri,
                        'id_user'           => $this->session->userdata('id_user'),
                        'judul_galeri'      => $i->post('judul_galeri'),
                        'isi_galeri'        => $i->post('isi_galeri'),
                        'website'           => $i->post('website'),
                        'gambar'            => $upload_data['uploads']['file_name'],
                        'posisi_galeri'     => $i->post('posisi_galeri'),
                    );
                    $this->galeri_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/galeri'), 'refresh');
                }
            } else {
                // Update galeri tanpa ganti gambar baru
                $i = $this->input;
                $data = array(
                    'id_galeri'         => $id_galeri,
                    'id_user'           => $this->session->userdata('id_user'),
                    'judul_galeri'      => $i->post('judul_galeri'),
                    'isi_galeri'        => $i->post('isi_galeri'),
                    'website'           => $i->post('website'),
                    // 'gambar'            => $upload_data['uploads']['file_name'],
                    'posisi_galeri'     => $i->post('posisi_galeri'),
                );
                $this->galeri_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/galeri'), 'refresh');
            }
        }
        // End masuk database
        $data = array(
            'title'         => 'Edit Galeri',
            'galeri'        => $galeri,
            'isi'           => 'admin/galeri/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, false);
    }

    // Delete
    public function delete($id_galeri)
    {
        // Proteksi delete
        $this->check_login->check();

        $galeri = $this->galeri_model->detail($id_galeri);

        // Hapus gambar
        if ($galeri->gambar != "") {
            unlink('./assets/upload/image/' . $galeri->gambar);
            unlink('./assets/upload/image/thumbs/' . $galeri->gambar);
        }
        // End hapus gambar
        $data = array('id_galeri'     => $galeri->id_galeri);
        $this->galeri_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/galeri'), 'refresh');
    }
}

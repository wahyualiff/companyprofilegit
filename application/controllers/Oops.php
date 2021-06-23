<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oops extends CI_Controller
{

    // Main page - Oopspage
    public function index()
    {
        $data = array(
            'title'  => 'Contact Camp404 - School of Web Programming',
            'isi'    => 'oops/list'
        );
        $this->load->view('layout/wrapper', $data, false);
    }
}

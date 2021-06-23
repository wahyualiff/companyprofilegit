<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    // Main page - Profilpage
    public function index()
    {
        $data = array(
            'title'  => 'Profile Camp404 - School of Web Programming',
            'isi'    => 'profile/list'
        );
        $this->load->view('layout/wrapper', $data, false);
    }
}

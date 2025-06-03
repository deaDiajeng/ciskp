<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        // parent::__construct();
        $this->load->helper('url');
        $this->load->view('daftar');
    }

    // public function index()
    // {
    //     $data['agenda'] = $this->Agenda_model->get_all();

    //     $this->load->view('layout/header');
    //     $this->load->view('layout/adminav');
    //     $this->load->view('layout/sidebar');
    //     $this->load->view('admin/agenda', $data);
    //     $this->load->view('script/agenda_script');
    //     $this->load->view('layout/footer');
    // }
}
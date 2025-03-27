<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Capaian_model');
    }

    public function index() {
        echo "ini adalah halaman capaian";
        // $data['capaian'] = $this->Capaian_model->get_all_capaian();
        $this->load->view('templates/header');
        $this->load->view('capaian'); 
        $this->load->view('templates/footer');
    }
}

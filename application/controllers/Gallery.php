<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class y extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Galeri_model');
    }

    public function index() {
        $data['gallery'] = $this->Gallery_model->get_all_galeri();
        $this->load->view('templates/header');
        $this->load->view('gallery/index', $data);
        $this->load->view('templates/footer');
    }
}

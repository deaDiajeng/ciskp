<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Gallery_model');
    }

    public function index() {
        // $data['gallery'] = $this->Gallery_model->get_all_galeri();
        echo "ini adalah halaman gallery";

        $this->load->view('templates/header');
        $this->load->view('gallery'); 
        $this->load->view('templates/footer');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Gallery_model');
    }

    public function index() {
        $data['gallery'] = $this->Gallery_model->get_all();

        $this->load->view('layout/header');
        $this->load->view('layout/adminav');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/gallery', $data);
        $this->load->view('layout/footer');
    }
}

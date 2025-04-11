<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Capaian_model');
    }

    public function index() {
        $data['achievement'] = $this->Capaian_model->get_all();
        
        $this->load->view('layout/header');
        $this->load->view('layout/adminav');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/capaian', $data); 
        $this->load->view('layout/footer');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Dashboard_model');
    }

    public function index() {
        // $data[''] = $this->Dashboard_model->get_all_dashboard();
        $this->load->view('templates/header');
        $this->load->view('dashboard'); 
        $this->load->view('templates/footer');
    }
}
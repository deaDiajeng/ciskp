<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Agenda_model');
    }

    public function index() {
        // $data['agenda'] = $this->Agenda_model->get_all_agenda();

        $this->load->view('layout/header');
        $this->load->view('layout/adminav');
        $this->load->view('admin/agenda');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/footer');
    }
}

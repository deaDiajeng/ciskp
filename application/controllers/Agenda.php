<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class y extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Agenda_model');
    }

    public function index() {
        $data['agenda'] = $this->Agenda_model->get_all_agenda();
        $this->load->view('templates/header');
        $this->load->view('agenda/index', $data); 
        $this->load->view('templates/footer');
    }
}

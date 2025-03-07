<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {

    public function get_all_agenda() {
        return $this->db->get('agenda')->result_array();
    }

}
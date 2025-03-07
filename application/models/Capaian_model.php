<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian_model extends CI_Model {

    public function get_all_capaian() {
        return $this->db->get('capaian')->result_array();
    }

}
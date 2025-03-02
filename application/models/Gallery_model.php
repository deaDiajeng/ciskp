<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    public function get_all_galeri() {
        return $this->db->get('galeri')->result_array();
    }

}
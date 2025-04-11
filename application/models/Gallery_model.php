<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all() {
        // return $this->db->get('gallery')->result();
        return $this->db->get_where('gallery', ['is_deleted' => 0])->result();
    }
}
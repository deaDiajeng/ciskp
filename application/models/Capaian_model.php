<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all() {
        // return $this->db->get('achievement')->result();
        return $this->db->get_where('achievement', ['is_deleted' => 0])->result();
    }

    // public function insert($data) {
    //     $this->db->insert('agenda', $data);
    // }

    // public function update($id, $data) {
    //     $this->db->where('id_agenda', $id)->update('agenda', $data);
    // }

    // public function soft_delete($id) {
    //     $this->db->where('id_agenda', $id)->update('agenda', ['is_deleted' => 1]);
    // }
}
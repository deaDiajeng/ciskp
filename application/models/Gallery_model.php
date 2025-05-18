<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all() 
    {
        return $this->db->get('gallery')->result();
        // return $this->db->get_where('gallery', ['is_deleted' => 0])->result();
    }

    public function insert($data) 
    {
        $this->db->insert('gallery', $data);
    }

    public function update($id, $data) 
    {
        $this->db->where('id_gallery', $id)->update('gallery', $data);
    }

    // public function soft_delete($id) {
    //     $this->db->where('id_gallery', $id)->update('aggallerynda', ['is_deleted' => 1]);
    // }
}

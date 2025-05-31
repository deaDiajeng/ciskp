<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all()
    {
        // return $this->db->get('agenda')->result();
        return $this->db->get_where('agenda', ['is_deleted' => 0])->result();
    }

    // public function get_all_index()
    // {
    //     // Ambil field yang sesuai, sesuaikan dengan nama kolom di database
    //     return $this->db->select('title, date, image')
    //         ->get_where('agenda', ['is_deleted' => 0])
    //         ->result();
    // }

    public function insert($data)
    {
        $this->db->insert('agenda', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_agenda', $id)->update('agenda', $data);
    }

    // public function soft_delete($id) {
    //     $this->db->where('id_agenda', $id)->update('agenda', ['is_deleted' => 1]);
    // }
}

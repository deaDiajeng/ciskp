<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_model');
    }

    public function index()
    {
        $this->load->view('daftar');
    }

    public function save()
    {
        $name = $this->input->post('name');
        $achievement = $this->input->post('achievement');
        $nomor = $this->input->post('nomor');

        // $config['upload_path'] = './uploads/capaian/';
        // $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        // $config['max_size'] = 2048;

        // $this->load->library('upload', $config);

        // $image = '';
        // if (!empty($_FILES['image']['name'])) {
        //     // Tambahkan timestamp ke nama file
        //     $original_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        //     $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        //     $timestamp = date('Ymd_His'); 
        //     $new_name = $original_name . '_' . $timestamp . '.' . $extension;

        //     $_FILES['image']['name'] = $new_name;

        //     if ($this->upload->do_upload('image')) {
        //         $image = $this->upload->data('file_name');
        //     } else {
        //         $error = $this->upload->display_errors();
        //         $this->session->set_flashdata('error', $error);
        //         redirect('capaian');
        //         return;
        //     }
        // }

        $data = [
            'name' => $name,
            'achievement' => $achievement,
            'image' => $image,
            'phone' => $nomor,
            'is_deleted' => 0
        ];

        $this->Daftar_model->insert($data);
        $this->session->set_flashdata('success', 'isi pesan');
        redirect('capaian');
    }

}
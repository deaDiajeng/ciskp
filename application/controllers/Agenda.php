<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model');
    }

    public function index()
    {
        $data['agenda'] = $this->Agenda_model->get_all();

        $this->load->view('layout/header');
        $this->load->view('layout/adminav');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/agenda', $data);
        $this->load->view('script/agenda_script');
        $this->load->view('layout/footer');
    }

    public function save()
    {
        //tes gitgraph
        $title = $this->input->post('title');
        $date = $this->input->post('date');

        $config['upload_path'] = './uploads/agenda/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        $image = '';
        if (!empty($_FILES['image']['name'])) {
            // Tambahkan timestamp ke nama file
            $original_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $timestamp = date('Ymd_His');
            $new_name = $original_name . '_' . $timestamp . '.' . $extension;

            $_FILES['image']['name'] = $new_name;

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('agenda');
                return;
            }
        }

        $data = [
            'title' => $title,
            'date' => $date,
            'image' => $image,
            'is_deleted' => 0
        ];

        $this->Agenda_model->insert($data);
        redirect('agenda');
    }


    public function update()
    {
        $id = $this->input->post('id_agenda');
        $title = $this->input->post('title');
        $date = $this->input->post('date');
        $oldImage = $this->input->post('old_image');

        $config['upload_path'] = './uploads/agenda/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if (!empty($_FILES['image']['name'])) {
            // Rename file dengan timestamp
            $original_name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $timestamp = date('Ymd_His');
            $new_name = $original_name . '_' . $timestamp . '.' . $extension;

            $_FILES['image']['name'] = $new_name;

            if ($this->upload->do_upload('image')) {
                $uploadedData = $this->upload->data();
                $newImage = $uploadedData['file_name'];

                // Hapus gambar lama
                $oldPath = './uploads/agenda/' . $oldImage;
                if (file_exists($oldPath) && is_file($oldPath)) {
                    unlink($oldPath);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Agenda');
                return;
            }
        } else {
            $newImage = $oldImage;
        }

        $data = [
            'title' => $title,
            'date' => $date,
            'image' => $newImage
        ];

        $this->db->where('id_agenda', $id);
        $this->db->update('agenda', $data);

        $this->session->set_flashdata('success', 'Agenda berhasil diperbarui.');
        redirect('Agenda');
    }


    public function delete($id)
    {
        // Ambil data agenda berdasarkan id
        $agenda = $this->db->get_where('agenda', ['id_agenda' => $id])->row();

        if ($agenda) {
            // Hapus file gambar jika ada
            $path = './uploads/agenda/' . $agenda->image;
            if (file_exists($path) && is_file($path)) {
                unlink($path);
            }

            // Soft delete (update is_deleted = 1)
            $this->db->where('id_agenda', $id);
            $this->db->update('agenda', ['is_deleted' => 1]);

            $this->session->set_flashdata('success', 'Agenda berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Agenda tidak ditemukan.');
        }

        redirect('Agenda');
    }
}

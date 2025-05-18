<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
    public function index()
    {
        // Ambil data menu dari model CMSMenu
        $this->load->model('CMSMenu_model');
        $menu_settings = $this->CMSMenu_model->getAll();
        
        $menu_status = [];
        foreach ($menu_settings as $menu) {
            $menu_status[$menu['menu_name']] = $menu['is_active'];
        }

        // Ambil data agenda hanya jika menu agenda aktif
        if (isset($menu_status['agenda']) && $menu_status['agenda']) {
            $this->load->model('Agenda_model');
            $data['agenda'] = $this->Agenda_model->get_all();
        } else {
            $data['agenda'] = [];
        }

        // Ambil data capaian hanya jika menu capaian aktif
        if (isset($menu_status['capaian']) && $menu_status['capaian']) {
            $this->load->model('Capaian_model');
            $data['capaian'] = $this->Capaian_model->get_all();
        } else {
            $data['capaian'] = [];
        }

        // Ambil data galeri hanya jika menu galeri aktif
        if (isset($menu_status['galery']) && $menu_status['galery']) {
            $this->load->model('Gallery_model');
            $data['galery'] = $this->Gallery_model->get_all();
        } else {
            $data['galery'] = [];
        }

        // Kirim status menu dan data ke view utama
        $data['menu_status'] = $menu_status;
        $this->load->view('index', $data);
    }
}

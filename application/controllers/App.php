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
            $menus = $menu['is_active'];
            $menu_status = [$menu['menu_name']];
        }

        // Ambil data agenda hanya jika menu agenda aktif
        if (isset($menu_status['agenda']) && $menus['agenda']) {
            $this->load->model('Agenda_model');
            $data['agenda'] = $this->Agenda_model->get_all();
        } else {
            $data['agenda'] = [];
        }

        // Ambil data capaian hanya jika menu capaian aktif
        if (isset($menu_status['hafalan']) && $menus['hafalan']) {
            $this->load->model('Capaian_model');
            $data['hafalan'] = $this->Capaian_model->get_all();
        } else {
            $data['hafalan'] = [];
        }

        // Ambil data galeri hanya jika menu galeri aktif
        if (isset($menu_status['gallery']) && $menus['gallery']) {
            $this->load->model('Gallery_model');
            $data['gallery'] = $this->Gallery_model->get_all();
        } else {
            $data['gallery'] = [];
        }

        // Kirim status menu dan data ke view utama
        $data['menu_status'] = $menu_status;
        $this->load->view('index', $data);
    }
}

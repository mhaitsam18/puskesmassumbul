<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Home_m');
        $this->load->model('Dokter_m');
        $maintenance = $this->db->get('tb_maintenance')->row();
        if ($maintenance->status == 0) {
            redirect('maintenance/index');
        }
    }

    public function index()
    {

        // $id_user = $this->session->userdata('is_login_member');

        // var_dump($id_user);die();

        $data['banner'] = $this->Home_m->get_banner();
        $data['slider'] = $this->Home_m->get_slider();
        $data['recentnews'] = $this->Home_m->get_recentnews();

        $data['content'] = 'home_v';
        $this->load->view('template_v', $data, false);
    }

    public function surat_rujukan()
    {

        $data['surats'] = $this->Home_m->get_surat_rujukan();

        $data['content'] = 'rujukan_surat_v';
        $this->load->view('template_v', $data);
    }

    public function resep_obat()
    {

        $data['resep'] = $this->Home_m->get_resep_obat();

        $data['content'] = 'resep_obat_v';
        $this->load->view('template_v', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
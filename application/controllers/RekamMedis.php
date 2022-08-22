<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $maintenance = $this->db->get('tb_maintenance')->row();
        if ($maintenance->status == 0) {
            redirect('maintenance/index');
        }
    }

    public function index()
    {
        $data['content'] = 'rekam_medis_v';
        $this->db->join('tb_member', 'tb_member.r_id=tb_rekam_medis.id_pasien');
        $data['rekam_medis'] = $this->db->get('tb_rekam_medis')->result();
        $this->load->view('template_v', $data, false);
    }

    public function show($id_rekam_medis = null)
    {
        $data['content'] = 'rekam_medis_detail';
        $this->db->join('tb_member', 'tb_member.r_id=tb_rekam_medis.id_pasien');
        $this->db->join('tb_dokter', 'tb_dokter.d_id=tb_rekam_medis.id_dokter');
        $data['rekam_medis'] = $this->db->get_where('tb_rekam_medis')->row();
        $this->load->view('template_v', $data, false);
    }
    public function create()
    {
        $data['content'] = 'rekam_medis_i';
        $data['pasiens'] = $this->db->get('tb_member')->result();
        $this->load->view('template_v', $data, false);
    }

    public function store()
    {
        echo $this->db->insert('tb_rekam_medis', [
            'id_dokter' => $this->input->post('id_dokter'),
            'id_pasien' => $this->input->post('id_pasien'),
            'golongan_darah' => $this->input->post('golongan_darah'),
            'tekanan_darah' => $this->input->post('tekanan_darah'),
            'suhu_tubuh' => $this->input->post('suhu_tubuh'),
            'tinggi_badan' => $this->input->post('tinggi_badan'),
            'berat_badan' => $this->input->post('berat_badan'),
            'alergi_makanan' => $this->input->post('alergi_makanan'),
            'alergi_obat' => $this->input->post('alergi_obat'),
            'keluhan' => $this->input->post('keluhan'),
            'diagnosa' => $this->input->post('diagnosa'),
            'keterangan' => $this->input->post('keterangan'),
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Data Rekam Medis Tersimpan!</div>');
        redirect('RekamMedis/index');
    }
}

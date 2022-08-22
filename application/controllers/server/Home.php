<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->database();
    }

    public function index()
    {
        $data['content'] = 'server/home_v.php';
        $this->db->join('tb_member', 'tb_member.r_id = tb_konsultasi.c_mid');
        $this->db->order_by('tb_konsultasi.created_on', 'ASC');
        $data['konsultasi'] = $this->db->get('tb_konsultasi')->result();
        $data['member'] = $this->db->get('tb_member')->num_rows();
        $data['dokter'] = $this->db->get('tb_dokter')->num_rows();
        $this->load->view('server/template_v', $data, false);
    }

    public function print_rekap()
    {
        $this->db->join('tb_member', 'tb_member.r_id = tb_konsultasi.c_mid');
        $this->db->order_by('tb_konsultasi.created_on', 'ASC');
        $data['konsultasi'] = $this->db->get('tb_konsultasi')->result();

        $this->load->view('server/p_rekap', $data);
    }

    public function add_maintenance()
    {

        $maintenance = $this->input->post('maintenance');
        $status = $this->input->post('status');

        $data = [
            'maintenance' => htmlspecialchars($maintenance),
            'status' => $status,
        ];

        $where = [
            'id' => 1,
        ];

        $this->db->update('tb_maintenance', $data, $where);
        if ($status == 1) {
            $s = 'Selesai';
        } else {
            $s = 'Mulai';
        }
        $this->db->insert('tb_histori_maintenance', [
            'status' => $s
        ]);

        $this->session->set_flashdata('success', 'Berhasil menambahkan maintenance');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_teguran()
    {

        $operator_id = $this->input->post('operator_id');
        $teguran = $this->input->post('teguran');

        $data = [
            'teguran' => htmlspecialchars($teguran),
            'd_id' => $operator_id,
        ];

        $this->db->insert('tb_teguran', $data);

        $this->session->set_flashdata('success', 'Berhasil mengirim teguran ke operator');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/server/Home.php */
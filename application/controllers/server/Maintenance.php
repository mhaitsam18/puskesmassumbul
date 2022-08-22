<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->database();
    }

    public function index()
    {

        $data['content']     = 'server/t_maintenance.php';
        $data['teguran']   = $this->db->get('tb_histori_maintenance')->result();

        $this->load->view('server/template_v', $data, FALSE);
    }
}

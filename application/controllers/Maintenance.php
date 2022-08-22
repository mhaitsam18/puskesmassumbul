<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['maintenance'] = $this->db->get('tb_maintenance')->row();
        $data['content'] = 'maintenance';
        $this->load->view('template_v', $data);
    }
}

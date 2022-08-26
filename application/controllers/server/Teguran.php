<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teguran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->database();
    }

    public function index()
    {

        $data['content']     = 'server/t_teguran.php';
        $this->db->join('tb_dokter', 'tb_dokter.d_id=tb_teguran.d_id');
        // $this->db->where('deleted_at', null);
        $data['teguran']   = $this->db->get('tb_teguran')->result();

        $this->load->view('server/template_v', $data, FALSE);
    }

    public function tutup($id_teguran = null)
    {
        $this->db->where('id_teguran', $id_teguran);
        $this->db->update('tb_teguran', [
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
        redirect($_SERVER['HTTP_REFERER']);
    }
}

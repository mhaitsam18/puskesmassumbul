<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Poli_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	function index()
	{
		$data['poli']    = $this->Poli_m->getAll();
		$jdpol   		 = $this->Poli_m->getJadwal();

		if ($jdpol) {
			foreach ($jdpol as $r) {
				$p_id   = $r['p_id'];
				$p_hari = $r['p_hari'];
				$data['jadwal']["$p_id"]["$p_hari"] = $r['p_jam'] . '@@' . $r['p_desc'];
			}
		}


		$data['content'] = 'poli_v';
		$this->load->view('template_v', $data);
	}
}

/* End of file Poli.php */
/* Location: ./application/controllers/Poli.php */
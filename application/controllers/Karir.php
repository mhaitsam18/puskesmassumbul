<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karir extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Karir_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	function index()
	{
		$data['karir'] = $this->Karir_m->getData()->row_array();
		$data['content'] = 'karir_v';
		$this->load->view('template_v', $data);
	}
}

/* End of file Karir.php */
/* Location: ./application/controllers/Karir.php */
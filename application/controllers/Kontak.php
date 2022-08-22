<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
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
		$data['content'] = 'kontak_v';

		$this->load->view('template_v', $data, FALSE);
	}
}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */
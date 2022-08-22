<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Layanan_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	function index()
	{
		$data['layanan'] = $this->Layanan_m->getLayPublish();
		$data['content'] = 'layanan_v';
		$this->load->view('template_v', $data);
	}

	function detail($permalink)
	{
		$data['layanan'] 		= $this->Layanan_m->getLayByPermalink($permalink)->row_array();
		$data['content'] 	= "layanan_detail_v";
		$this->load->view('template_v', $data);
	}
}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */
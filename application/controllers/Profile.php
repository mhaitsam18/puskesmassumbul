<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Profile_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	public function index()
	{
		$data['dataprofile']	= $this->Profile_m->get_info();
		$data['content'] = 'profile_v';
		$this->load->view('template_v', $data, FALSE);
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kritiksaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kritiksaran_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	function index()
	{
		$data['content'] = 'kritiksaran_v';
		$this->load->view('template_v', $data);
	}

	function save()
	{


		$fdata['c_name']		= $this->input->post('u_name');
		$fdata['c_email']		= $this->input->post('u_email');
		$fdata['c_desc']		= $this->input->post('u_desc');
		$fdata['created_on']	= date('Y-m-d h:i:s');

		$insert = $this->Kritiksaran_m->save($fdata);

		$this->session->set_flashdata('success', 'Terima kasih telah meluangkan waktu anda untuk kami.<br>kami berkomitmen selalu memberikan pelayanan yang terbaik.');

		redirect(base_url() . 'kritiksaran/success', 'refresh');
	}

	function success()
	{
		$data['content'] = 'kritiksaran_success_v';
		$this->load->view('template_v', $data);
	}
}

/* End of file Kritiksaran.php */
/* Location: ./application/controllers/Kritiksaran.php */
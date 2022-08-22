<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasidokter extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->general->cekMemberLogin();
		$this->load->database();
		$this->load->model('Konsultasidokter_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	function index()
	{
		$did = $this->session->userdata('idlogin');
		$data['listcontact'] = $this->Konsultasidokter_m->get_list_chat($did);
		$data['content']  = 'konsultasidokter_home_v';
		$this->load->view('template_v', $data, FALSE);
	}


	function chat()
	{
		$data['member']	  = $this->Konsultasidokter_m->get_member_by_id($this->uri->segment(3))->row_array();

		$mid = $data['member']['r_id'];
		$did = $this->session->userdata('idlogin');

		$data['datachat'] = $this->Konsultasidokter_m->get_chat($did, $mid);

		$data['content']  = 'konsultasidokter_chat_v';
		$this->load->view('template_v', $data, FALSE);
	}

	function save()
	{

		$fdata['c_did']			= $this->session->userdata('idlogin');
		$fdata['c_mid']			= $this->input->post('m_id');
		$fdata['c_value']		= $this->input->post('message');
		$fdata['created_by']	= 'D';
		$fdata['created_on']	= date('Y-m-d h:i:s');

		$save = $this->Konsultasidokter_m->save($fdata);

		$datachat = $this->Konsultasidokter_m->get_chat($fdata['c_did'], $fdata['c_mid']);
		$out = '';
		if ($datachat) {

			$out = '';
			foreach ($datachat as $dc) {
				if ($dc['created_by'] == 'D') {
					$gambar 		= $this->session->userdata('image');
					$sisi_direct   	= 'right';
					$float			= 'style="float: none !important;"';
					$sisi_pull   	= 'right';
				} else {
					$gambar 		= 'member/' . $this->input->post('image');
					$sisi_direct   	= '';
					$float			= '';
					$sisi_pull   	= 'left';
				}

				$out .= '	<div class="direct-chat-msg ' . $sisi_direct . '" ' . $float . '>
			                      <div class="direct-chat-info clearfix" style="text-align: ' . $sisi_pull . ';">
			                      	<span class="direct-chat-timestamp">
			                      		' . date('d-m-Y h:i:s', strtotime($dc['created_on'])) . '
			                        </span>
			                      </div>
			                      <img class="direct-chat-img" src="' . base_url() . 'image/' . $gambar . '" alt="img-profile">
			                      <div class="direct-chat-text">';
				if ($dc['created_by'] == 'D') {
					$out .= '<i class="fa fa-times" onclick="del(' . $dc['c_id'] . ')"></i> <br>';
				}
				$out .= nl2br($dc['c_value']) . '
			                        <br>
			                      </div>
			                    </div>';
			}
		}

		echo json_encode(array(
			'content' => $out
		));
	}

	function hapus()
	{
		$this->Konsultasidokter_m->delete($this->input->post('id'));
		echo json_encode(array('SuccessMsg' => 'Success'));
	}

	function reload()
	{
		$fdata['c_did']			= $this->session->userdata('idlogin');
		$fdata['c_mid']			= $this->input->post('m_id');

		$datachat = $this->Konsultasidokter_m->get_chat($fdata['c_did'], $fdata['c_mid']);

		$out = '';
		if ($datachat) {

			$out = '';
			foreach ($datachat as $dc) {
				if ($dc['created_by'] == 'D') {
					$gambar 		= $this->session->userdata('image');
					$sisi_direct   	= 'right';
					$float			= 'style="float: none !important;"';
					$sisi_pull   	= 'right';
				} else {
					$gambar 		= 'member/' . $this->input->post('image');
					$sisi_direct   	= '';
					$float			= '';
					$sisi_pull   	= 'left';
				}

				$out .= '	<div class="direct-chat-msg ' . $sisi_direct . '" ' . $float . '>
			                      <div class="direct-chat-info clearfix" style="text-align: ' . $sisi_pull . ';">
			                      	<span class="direct-chat-timestamp">
			                      		' . date('d-m-Y h:i:s', strtotime($dc['created_on'])) . '
			                        </span>
			                      </div>
			                      <img class="direct-chat-img" src="' . base_url() . 'image/' . $gambar . '" alt="img-profile">
			                      <div class="direct-chat-text">';
				if ($dc['created_by'] == 'D') {
					$out .= '<i class="fa fa-times" onclick="del(' . $dc['c_id'] . ')"></i> <br>';
				}
				$out .= nl2br($dc['c_value']) . '
			                        <br>
			                      </div>
			                    </div>';
			}
		}

		echo json_encode(array(
			'content' => $out
		));
	}
}

/* End of file Konsultasidokter.php */
/* Location: ./application/controllers/Konsultasidokter.php */
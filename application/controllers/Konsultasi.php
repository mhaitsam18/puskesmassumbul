<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->general->cekMemberLogin();
		$this->load->database();
		$this->load->model('Konsultasi_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}

	}

	function index()
	{
		$cari = strtolower($this->input->get('cari'));

		$data['dokter']  = $this->Konsultasi_m->getAll($cari);

		$data['content'] = 'konsultasi_home_v';
		$this->load->view('template_v', $data, FALSE);
	}


	function chat()
	{
		$data['dokter']	  = $this->Konsultasi_m->get_dokter_by_id($this->uri->segment(3))->row_array();

		$did = $data['dokter']['d_id'];
		$mid = $this->session->userdata('idlogin');


		$data['listcontact'] = $this->Konsultasi_m->get_list_chat($mid);
		$data['datachat'] = $this->Konsultasi_m->get_chat($mid,$did);

		$data['content']  = 'konsultasi_chat_v';
		$this->load->view('template_v', $data, FALSE);
	}

	function hapus() {
		$this->Konsultasi_m->delete($this->input->post('id'));
		echo json_encode(array('SuccessMsg'=> 'Success'));
	}

	function save()
	{
		$d_link =  $this->input->post('d_link');

		$fdata['c_did']			= $this->input->post('dokter');
		$fdata['c_mid']			= $this->session->userdata('idlogin');
		$fdata['c_value']		= $this->input->post('message');
		$fdata['created_by']	= 'M';
		$fdata['created_on']	= date('Y-m-d h:i:s');

		$save = $this->Konsultasi_m->save($fdata);

		$datachat = $this->Konsultasi_m->get_chat($fdata['c_mid'],$fdata['c_did']);	
		$out = '';
		if($datachat){

			$out = '';
			foreach ($datachat as $dc){
				if($dc['created_by'] == 'M'){
	          		$gambar 		= $this->session->userdata('image');
	          		$sisi_direct   	= 'right';
	          		$float			= 'style="float: none !important;"';
	          		$sisi_pull   	= 'right';
	          	}else{
	          		$gambar 		= 'dokter/'.$this->input->post('image');
	          		$sisi_direct   	= '';
	          		$float			= '';
	          		$sisi_pull   	= 'left';

	          	}	

	                $out .= '	<div class="direct-chat-msg '.$sisi_direct.'" '.$float.'>
			                      <div class="direct-chat-info clearfix" style="text-align: '.$sisi_pull.';">
			                      	<span class="direct-chat-timestamp">
			                      		'.date('d-m-Y h:i:s', strtotime($dc['created_on'])).'
			                        </span>
			                      </div>
			                      <img class="direct-chat-img" src="'.base_url().'image/'.$gambar.'" alt="img-profile">
			                      <div class="direct-chat-text">';
			                        if($dc['created_by'] == 'M'){
			                          $out .= '<i class="fa fa-times" onclick="del('.$dc['c_id'].')"></i> <br>';
			                        }
			                    $out .= nl2br($dc['c_value']).'
			                        <br>
			                      </div>
			                    </div>';
			}
		}	

		echo json_encode(array(
							'content'=> $out
			));
	}

	function reload()
	{
		$d_link =  $this->input->post('d_link');

		$fdata['c_did']			= $this->input->post('dokter');
		$fdata['c_mid']			= $this->session->userdata('idlogin');

		$datachat = $this->Konsultasi_m->get_chat($fdata['c_mid'],$fdata['c_did']);	
		$out = '';
		if($datachat){

			$out = '';
			foreach ($datachat as $dc){
				if($dc['created_by'] == 'M'){
	          		$gambar 		= $this->session->userdata('image');
	          		$sisi_direct   	= 'right';
	          		$float			= 'style="float: none !important;"';
	          		$sisi_pull   	= 'right';
	          	}else{
	          		$gambar 		= 'dokter/'.$this->input->post('image');
	          		$sisi_direct   	= '';
	          		$float			= '';
	          		$sisi_pull   	= 'left';

	          	}	

	                $out .= '	<div class="direct-chat-msg '.$sisi_direct.'" '.$float.'>
			                      <div class="direct-chat-info clearfix" style="text-align: '.$sisi_pull.';">
			                      	<span class="direct-chat-timestamp">
			                      		'.date('d-m-Y h:i:s', strtotime($dc['created_on'])).'
			                        </span>
			                      </div>
			                      <img class="direct-chat-img" src="'.base_url().'image/'.$gambar.'" alt="img-profile">
			                      <div class="direct-chat-text">';
			                        if($dc['created_by'] == 'M'){
			                          $out .= '<i class="fa fa-times" onclick="del('.$dc['c_id'].')"></i> <br>';
			                        }
			                    $out .= nl2br($dc['c_value']).'
			                        <br>
			                      </div>
			                    </div>';
			}
		}	

		echo json_encode(array(
							'content'=> $out
			));
	}

}

/* End of file Konsultasi.php */
/* Location: ./application/controllers/Konsultasi.php */
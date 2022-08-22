<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useradmin extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Useradmin_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_useradmin.php';
		$data['useradmin']   = $this->Useradmin_m->findAll();

		$this->load->view('server/template_v', $data, FALSE);
	}

	function form() {

		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = $this->uri->segment(5);

		$submit1 = "Simpan";
		$submit2 = "Edit";

		if ($mod == "add") {
			
        	$data['submit']     = $submit1;
        	$data['mod']        = $mod;
        	$data['cmbstatus']  = $this->combostatus();
        	$data['cmbrole']    = $this->comborole();



        	$data['action']		= site_url('server/useradmin/form/aksiadd');

        	if ($this->form_validation->run() == FALSE) {
        		
        		$data['useradmin']['nama_lengkap']  = '';
        		$data['useradmin']['email']  		= '';
        		$data['useradmin']['no_hp']  		= '';
        		$data['useradmin']['username'] 		= '';
        		$data['useradmin']['password'] 		= '';
        		$data['useradmin']['role'] 			= '';
        		$data['useradmin']['active'] 		= '';

				$data['content'] 	= "server/f_useradmin";

				$this->load->view('server/template_v', $data, FALSE);

        	} else {
        		
        		?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
        	}

		} elseif ($mod == "edit") {

			$data['action'] 	= site_url('server/useradmin/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['useradmin'] = $this->Useradmin_m->get_by_id($id)->row_array();

        		$data['cmbstatus'] = $this->combostatus($data['useradmin']['active']);
        		$data['cmbrole']   = $this->comborole($data['useradmin']['role']);
			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_useradmin";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		} elseif ($mod == "aksiadd") {
			

			//Mengambil data dari form
			$fdata['nama_lengkap']	= $this->input->post('nama_lengkap');
			$fdata['email']			= $this->input->post('email');
			$fdata['no_hp']			= $this->input->post('no_hp');
			$fdata['username']		= $this->input->post('username');
			$fdata['password']		= md5($this->input->post('password'));
			$fdata['active']		= $this->input->post('active');
			$fdata['role']			= $this->input->post('role');
			$fdata['created_by']	= $this->session->userdata('username');
			$fdata['created_on']	= date('Y-m-d h:i:s');

			$insert = $this->Useradmin_m->save($fdata);

			?>
            	<script type="text/javascript" language="javascript">
                	alert("Data Berhasil Di Tambahkan !!!");
            	</script>

			<?php

			redirect('server/useradmin','refresh');
	
		} elseif ($mod == "aksiedit") {
			//Mengambil data dari form
			$fdata['nama_lengkap']	= $this->input->post('nama_lengkap');
			$fdata['email']			= $this->input->post('email');
			$fdata['no_hp']			= $this->input->post('no_hp');
			$fdata['username']		= $this->input->post('username');
			if(!empty($this->input->post('password'))){
				$fdata['password']	= md5($this->input->post('password'));
			}
			$fdata['active']		= $this->input->post('active');
			$fdata['role']			= $this->input->post('role');
			$fdata['modified_by']	= $this->session->userdata('username');
			$fdata['modified_on']	= date('Y-m-d h:i:s');
				

			$this->Useradmin_m->update($id, $fdata);
			$data['useradmin']	= $this->Useradmin_m->get_by_id($id)->row_array();

			?>
                <script type="text/javascript" language="javascript">
                    alert("Data Berhasil Di Ubah !!!");
                </script>
            <?php
            
            redirect('server/useradmin', 'refresh');
	
		} else {

			?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            <?php

			echo "<script>javascript:history.go(-1);</script>";
		}
	}

	function hapus($id) {

		$this->Useradmin_m->delete($id);

		?>
            <script type="text/javascript" language="javascript">
                alert("Data Berhasil Di Hapus !!!");
            </script>
        <?php
                
        redirect('server/useradmin', 'refresh');
	}

	function combostatus($nilai = null){
		$out = '';
		$qry = array('','Aktif','Tidak Aktif');
		foreach ($qry as $val) {
			if($nilai == $val){
				$out .= '<option value="'.$val.'" selected>'.$val.'</option>';
			}else{
				$out .= '<option value="'.$val.'">'.$val.'</option>';
			}
		}
		return $out;
	}

	function comborole($nilai = null){
		$out = '<option value=""></option>';


		$qry = $this->Useradmin_m->findRole();
		
		if(is_array($qry)){
			foreach ($qry as $r) {
				if($nilai == $r['role_id']){
					$out .= '<option value="'.$r['role_id'].'" selected>'.$r['role_name'].'</option>';
				}else{
					$out .= '<option value="'.$r['role_id'].'">'.$r['role_name'].'</option>';
				}
			}	
		}
		return $out;
	}
}



/* End of file Useradmin.php */
/* Location: ./application/controllers/server/Useradmin.php */
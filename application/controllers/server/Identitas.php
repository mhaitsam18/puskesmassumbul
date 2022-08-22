<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Identitas_m');

	}

	public function index()
	{

		$data['identitas']   = array('sejarah', 'visi_misi', 'contact');
		$data['content'] 	= 'server/t_identitas.php';
		$this->load->view('server/template_v', $data, FALSE);
	}

	function form() {

		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = $this->uri->segment(5);

		$submit1 = "Simpan";
		$submit2 = "Edit";


		if ($mod == "edit") {

			$data['action'] 	= site_url('server/identitas/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['identitas'] = $this->Identitas_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_identitas";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		}elseif ($mod == "aksiedit") {

			$fdata['c_value']		= $this->input->post('c_value');
			$fdata['modified_by']	= $this->session->userdata('username');
			$fdata['modified_on']	= date('Y-m-d h:i:s');

			$this->Identitas_m->update($id, $fdata);
			$data['identitas']	= $this->Identitas_m->get_by_id($id)->row_array();

			?>
                <script type="text/javascript" language="javascript">
                    alert("Data Berhasil Di Ubah !!!");
                </script>
            <?php
            
            redirect('server/identitas', 'refresh');
			
		} else {

			?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            <?php

			echo "<script>javascript:history.go(-1);</script>";
		}
	}
}

/* End of file Identitas.php */
/* Location: ./application/controllers/server/Identitas.php */
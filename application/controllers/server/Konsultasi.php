<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Konsultasi_m');
	}

	public function index()
	{

		$data['content'] 	  = 'server/t_konsultasi.php';
		$data['konsul']   	  = $this->Konsultasi_m->findAll();

		$this->load->view('server/template_v', $data, FALSE);
	}

	function view()
	{
		$id =  $this->input->post('id');
		$data = $this->Konsultasi_m->get_by_id($id)->row_array();
		echo json_encode(array('content'=> $data['c_value']));
	}

	function form() {

		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = $this->uri->segment(5);

		$submit1 = "Simpan";
		$submit2 = "Edit";

		if ($mod == "edit") {

			$data['action'] 	= site_url('server/konsultasi/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['konsultasi'] = $this->Konsultasi_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_konsultasi";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		

		} elseif ($mod == "aksiedit") {
			
			//Mengambil data dari form
			$fdata['c_name']		= $this->input->post('c_name');
			$fdata['c_email']		= $this->input->post('c_email');
			$fdata['c_desc']		= $this->input->post('c_desc');
			$fdata['modified_by']	= $this->session->userdata('username');
			$fdata['modified_on']	= date('Y-m-d h:i:s');
				

			$this->Konsultasi_m->update($id, $fdata);
			$data['konsultasi']	= $this->Konsultasi_m->get_by_id($id)->row_array();

			?>
                <script type="text/javascript" language="javascript">
                    alert("Data Berhasil Di Ubah !!!");
                </script>
            <?php
            
            redirect('server/konsultasi', 'refresh');
			
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
		$this->Konsultasi_m->delete($id);

		?>
            <script type="text/javascript" language="javascript">
                alert("Data Berhasil Di Hapus !!!");
            </script>
        <?php
                
        redirect('server/konsultasi', 'refresh');
	}
}

/* End of file Konsultasi.php */
/* Location: ./application/controllers/server/Konsultasi.php */
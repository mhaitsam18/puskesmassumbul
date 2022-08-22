<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosmed extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Sosmed_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_sosmed.php';
		$data['sosmed']   = $this->Sosmed_m->findAll();

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
        	$data['action']		= site_url('server/sosmed/form/aksiadd');

        	if ($this->form_validation->run() == FALSE) {
        		
        		$data['sosmed']['judul']  		= '';
        		$data['sosmed']['isi_singkat']  	= '';
        		$data['sosmed']['isi']  			= '';
        		$data['sosmed']['flag'] 			= '';
        		$data['sosmed']['gambar'] 		= '';

				$data['content'] 	= "server/f_sosmed";

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

			$data['action'] 	= site_url('server/sosmed/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['sosmed'] = $this->Sosmed_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_sosmed";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		} elseif ($mod == "aksiadd") {

			//Mengambil data dari form
			$fdata['sm_id']			= $this->input->post('sm_id');
			$fdata['sm_value']		= $this->input->post('sm_value');
			$fdata['created_by']	= $this->session->userdata('nama_lengkap');
			$fdata['created_on']	= date('Y-m-d h:i:s');

			$insert = $this->Sosmed_m->save($fdata);

			?>
            	<script type="text/javascript" language="javascript">
                	alert("Data Berhasil Di Tambahkan !!!");
            	</script>

			<?php

			redirect('server/sosmed','refresh');

		} elseif ($mod == "aksiedit") {

			$fdata['sm_id']			= $this->input->post('sm_id');
			$fdata['sm_value']		= $this->input->post('sm_value');
			$fdata['modified_by']	= $this->session->userdata('username');
			$fdata['modified_on']	= date('Y-m-d h:i:s');
			


			$this->Sosmed_m->update($id, $fdata);
			$data['sosmed']	= $this->Sosmed_m->get_by_id($id)->row_array();

			?>
                <script type="text/javascript" language="javascript">
                    alert("Data Berhasil Di Ubah !!!");
                </script>
            <?php
            
            redirect('server/sosmed', 'refresh');
			
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

		$this->Sosmed_m->delete($id);

		?>
            <script type="text/javascript" language="javascript">
                alert("Data Berhasil Di Hapus !!!");
            </script>
        <?php
                
        redirect('server/sosmed', 'refresh');
	}
}

/* End of file Sosmed.php */
/* Location: ./application/controllers/server/Sosmed.php */
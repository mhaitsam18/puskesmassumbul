<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Logo_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_logo.php';
		$this->load->view('server/template_v', $data, FALSE);
	}

	function form() {

		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = 'logo';

		$submit1 = "Simpan";
		$submit2 = "Edit";


		if ($mod == "edit") {

			$data['action'] 	= site_url('server/logo/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['logo'] = $this->Logo_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_logo";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		}elseif ($mod == "aksiedit") {

			$new_name = time().$_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/identitas';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
			$config['max_size']      = '2000';
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;
		
			$this->load->library('upload', $config);
			
			$id = 'logo';

			if (empty($_FILES['gambar']['name'])) {

				$fdata['modified_by']	= $this->session->userdata('username');
				$fdata['modified_on']	= date('Y-m-d h:i:s');

				$this->Logo_m->update($id, $fdata);
				$data['logo']	= $this->Logo_m->get_by_id($id)->row_array();

				?>
                    <script type="text/javascript" language="javascript">
                        alert("Data Berhasil Di Ubah !!!");
                    </script>
                <?php
                
                redirect('server/logo', 'refresh');
			
			} else {

				if ( ! $this->upload->do_upload('gambar')){

					alert("File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB");
					echo "<script>javascript:history.go(-1);</script>";
				
				} else {

					$fdata['c_value']	    = str_replace(" ","_",$new_name);
					$fdata['modified_by']	= $this->session->userdata('username');
					$fdata['modified_on']	= date('Y-m-d h:i:s');

					$old = $this->Logo_m->get_by_id($id)->row_array();
					unlink('image/identitas/'.$old['c_value']);

					$this->Logo_m->update($id, $fdata);
					$data['logo']	= $this->Logo_m->get_by_id($id)->row_array();

					?>
                    	<script type="text/javascript" language="javascript">
                        	alert("Data Berhasil Di Ubah !!!");
                    	</script>
                	<?php
                
                	redirect('server/logo', 'refresh');
                }

			}
			
	
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

/* End of file Logo.php */
/* Location: ./application/controllers/server/Logo.php */
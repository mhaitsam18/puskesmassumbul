<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karir extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Karir_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_karir.php';
		$data['karir']   = $this->Karir_m->findAll();

		$this->load->view('server/template_v', $data, FALSE);
	}

	function form() {

		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = $this->uri->segment(5);

		$submit1 = "Simpan";
		$submit2 = "Edit";


		if ($mod == "edit") {

			$data['action'] 	= site_url('server/karir/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['karir'] = $this->Karir_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_karir";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		}elseif ($mod == "aksiedit") {

			$new_name = time().$_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/identitas';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
			$config['max_size']      = '2000';
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;
		
			$this->load->library('upload', $config);
			
			$id = $this->input->post('c_id');

			if (empty($_FILES['gambar']['name'])) {

				$fdata['c_desc']		= $this->input->post('c_desc');
				$fdata['modified_by']	= $this->session->userdata('username');
				$fdata['modified_on']	= date('Y-m-d h:i:s');

				$this->Karir_m->update($id, $fdata);
				$data['karir']	= $this->Karir_m->get_by_id($id)->row_array();

				?>
                    <script type="text/javascript" language="javascript">
                        alert("Data Berhasil Di Ubah !!!");
                    </script>
                <?php
                
                redirect('server/karir', 'refresh');
			
			} else {

				if ( ! $this->upload->do_upload('gambar')){

					alert("File foto yang di unggah tidak sesuai, Format harus gif/jpg/png dan Max Ukuran 2MB");
					echo "<script>javascript:history.go(-1);</script>";
				
				} else {

					$fdata['c_desc']		= $this->input->post('c_desc');
					$fdata['c_image']	    = str_replace(" ","_",$new_name);
					$fdata['modified_by']	= $this->session->userdata('username');
					$fdata['modified_on']	= date('Y-m-d h:i:s');


					$old = $this->Karir_m->get_by_id($id)->row_array();
					unlink('image/karir/'.$old['c_image']);


					$this->Karir_m->update($id, $fdata);
					$data['karir']	= $this->Karir_m->get_by_id($id)->row_array();

					?>
                    	<script type="text/javascript" language="javascript">
                        	alert("Data Berhasil Di Ubah !!!");
                    	</script>
                	<?php

                	redirect('server/karir', 'refresh');
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

/* End of file Karir.php */
/* Location: ./application/controllers/server/Karir.php */
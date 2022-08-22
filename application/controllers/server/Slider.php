<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Slider_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_slider.php';
		$data['slider']   = $this->Slider_m->findAll();

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
        	$data['action']		= site_url('server/slider/form/aksiadd');

        	if ($this->form_validation->run() == FALSE) {
        		
        		$data['slider']['gambar'] 		= '';

				$data['content'] 	= "server/f_slider";

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

			$data['action'] 	= site_url('server/slider/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['slider'] = $this->Slider_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_slider";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		} elseif ($mod == "aksiadd") {

			$new_name = time().$_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/slider';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
			$config['max_size']      = '2000';
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;
		
			$this->load->library('upload', $config);
			
			if (empty($_FILES['gambar']['name'])) {

				echo "<script>alert('Gambar belum dipilih..');</script>";
				echo "<script>javascript:history.go(-1);</script>";
			
			} else {

				if ( ! $this->upload->do_upload('gambar')){
					
					echo "<script>alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB')</script>";
					echo "<script>javascript:history.go(-1);</script>";
				
				} else {

					//Mengambil data dari form
					$fdata['slid_image']	    	= str_replace(" ","_",$new_name);
					$fdata['created_by']			= $this->session->userdata('username');
					$fdata['created_on']			= date('Y-m-d h:i:s');

					$insert = $this->Slider_m->save($fdata);

					?>
                    	<script type="text/javascript" language="javascript">
                        	alert("Data Berhasil Di Tambahkan !!!");
                    	</script>

					<?php

					redirect('server/slider','refresh');

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

	function hapus($id) {

		$old = $this->Slider_m->get_by_id($id)->row_array();
		unlink('image/slider/'.$old['slid_image']);

		$this->Slider_m->delete($id);

		?>
            <script type="text/javascript" language="javascript">
                alert("Data Berhasil Di Hapus !!!");
            </script>
        <?php
                
        redirect('server/slider', 'refresh');
	}
}

/* End of file Slider.php */
/* Location: ./application/controllers/server/Slider.php */
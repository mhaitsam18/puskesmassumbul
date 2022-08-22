<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Layanan_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_layanan.php';
		$data['layanan']   = $this->Layanan_m->findAll();

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
        	$data['action']		= site_url('server/layanan/form/aksiadd');

        	if ($this->form_validation->run() == FALSE) {
        		
        		$data['layanan']['c_name']  	= '';
        		$data['layanan']['c_desc']  	= '';
        		$data['layanan']['c_image'] 	= '';

				$data['content'] 	= "server/f_layanan";

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

			$data['action'] 	= site_url('server/layanan/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['layanan'] = $this->Layanan_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_layanan";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		} elseif ($mod == "aksiadd") {

			$new_name = time().$_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/layanan';
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

					echo "<script>alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB');</script>";
					echo "<script>javascript:history.go(-1);</script>";
				
				} else {

					//Mengambil data dari form
					$fdata['c_name']		= $this->input->post('c_name');
					$fdata['c_desc']		= $this->input->post('c_desc');
					$fdata['c_image']	    = str_replace(" ","_",$new_name);
					$fdata['permalink']	    = textToSlug($this->input->post('c_name'));
					$fdata['created_by']	= $this->session->userdata('nama_lengkap');
					$fdata['created_on']	= date('Y-m-d h:i:s');

					$insert = $this->Layanan_m->save($fdata);

					?>
                    	<script type="text/javascript" language="javascript">
                        	alert("Data Berhasil Di Tambahkan !!!");
                    	</script>

					<?php

					redirect('server/layanan','refresh');

				}

			}

		} elseif ($mod == "aksiedit") {

			$new_name = time().$_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/layanan';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
			$config['max_size']      = '2000';
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;
		
			$this->load->library('upload', $config);
			
			$id = $this->input->post('c_id');

			if (empty($_FILES['gambar']['name'])) {

				$fdata['c_name']		= $this->input->post('c_name');
				$fdata['c_desc']		= $this->input->post('c_desc');
				$fdata['permalink']	    = textToSlug($this->input->post('c_name'));
				$fdata['modified_by']	= $this->session->userdata('username');
				$fdata['modified_on']	= date('Y-m-d h:i:s');
				

				$this->Layanan_m->update($id, $fdata);
				$data['layanan']	= $this->Layanan_m->get_by_id($id)->row_array();

				?>
                    <script type="text/javascript" language="javascript">
                        alert("Data Berhasil Di Ubah !!!");
                    </script>
                <?php
                
                redirect('server/layanan', 'refresh');
			
			} else {

				if ( ! $this->upload->do_upload('gambar')){

					alert("File foto yang di unggah tidak sesuai, Format harus gjpg/png dan Max Ukuran 2MB");
					echo "<script>javascript:history.go(-1);</script>";
				
				} else {

					$old = $this->Layanan_m->get_by_id($id)->row_array();
					unlink('image/layanan/'.$old['c_image']);


					$fdata['c_name']		= $this->input->post('c_name');
					$fdata['c_desc']		= $this->input->post('c_desc');
					$fdata['c_image']	    = str_replace(" ","_",$new_name);
					$fdata['permalink']	    = textToSlug($this->input->post('c_name'));
					$fdata['modified_by']	= $this->session->userdata('username');
					$fdata['modified_on']	= date('Y-m-d h:i:s');

					$this->Layanan_m->update($id, $fdata);
					$data['layanan']	= $this->Layanan_m->get_by_id($id)->row_array();

					?>
                    	<script type="text/javascript" language="javascript">
                        	alert("Data Berhasil Di Ubah !!!");
                    	</script>
                	<?php
                
                	redirect('server/layanan', 'refresh');
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
		$data = $this->Layanan_m->get_by_id($id)->row_array();
		unlink('image/layanan/'.$data['c_image']);
		$this->Layanan_m->delete($id);

		?>
            <script type="text/javascript" language="javascript">
                alert("Data Berhasil Di Hapus !!!");
            </script>
        <?php
                
        redirect('server/layanan', 'refresh');
	}
}


function textToSlug($text='') {
  $text = trim($text);
  if (empty($text)) return '';
    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
    $text = strtolower(trim($text));
    $text = str_replace(' ', '-', $text);
    $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
    return $text;
}
/* End of file Layanan.php */
/* Location: ./application/controllers/server/Layanan.php */
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Member_m');
	}

	public function index()
	{

		$data['content'] 	= 'server/t_member.php';
		$data['member']   = $this->Member_m->findAll();

		$this->load->view('server/template_v', $data, FALSE);
	}

	function transfer()
	{
		$id = $this->uri->segment(4);

		$insert = $this->Member_m->transfer_member($id);
?>
		<script type="text/javascript" language="javascript">
			alert("Data user telah aktif!");
		</script>
		<?php
		redirect('server/member', 'refresh');
	}

	function form()
	{

		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = $this->uri->segment(5);

		$submit1 = "Simpan";
		$submit2 = "Edit";

		if ($mod == "add") {

			$data['submit']     = $submit1;
			$data['mod']        = $mod;
			$data['action']		= site_url('server/member/form/aksiadd');

			if ($this->form_validation->run() == FALSE) {

				$data['member']['r_mail']  		= '';
				$data['member']['r_pass']  		= '';
				$data['member']['r_fullname']  	= '';
				$data['member']['r_bday'] 		= '';
				$data['member']['r_gender'] 	= '';
				$data['member']['r_validate'] 	= '';
				$data['member']['r_status'] 	= '';

				$data['content'] 	= "server/f_member";

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

			$data['action'] 	= site_url('server/member/form/aksiedit/' . $id);

			if ($this->form_validation->run() == FALSE) {

				$data['member'] = $this->Member_m->get_by_id($id)->row_array();
			} else {

			?>
				<script type="text/javascript" language="javascript">
					alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
				</script>
				<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_member";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		} elseif ($mod == "aksiadd") {

			$new_name = time() . $_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/member';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
			$config['max_size']      = '20000';
			// $config['max_width']     = '2024';
			// $config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;
			$this->load->library('upload', $config);

			if (empty($_FILES['gambar']['name'])) {
				echo "<script>alert('Gambar belum dipilih..');</script>";
				echo "<script>javascript:history.go(-1);</script>";
			} else {
				if (!$this->upload->do_upload('gambar')) {
					echo "<script>alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB');</script>";
					echo "<script>javascript:history.go(-1);</script>";
				} else {
					//Mengambil data dari form
					$fdata['r_mail']		= $this->input->post('r_mail');
					$fdata['r_pass']		= md5($this->input->post('r_pass'));
					$fdata['r_fullname']	= $this->input->post('r_fullname');
					$fdata['r_bday']		= $this->input->post('r_bday');
					$fdata['r_gender']		= $this->input->post('r_gender');
					$fdata['r_validate']	= $this->input->post('r_validate');
					$fdata['r_status']		= $this->input->post('r_status');
					$fdata['r_image']	    = str_replace(" ", "_", $new_name);
					$fdata['created_on']	= date('Y-m-d h:i:s');

					$insert = $this->Member_m->save($fdata);

				?>
					<script type="text/javascript" language="javascript">
						alert("Data Berhasil Di Tambahkan !!!");
					</script>

				<?php

					redirect('server/member', 'refresh');
				}
			}
		} elseif ($mod == "aksiedit") {
			//Mengambil data dari form
			$new_name = time() . $_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/member';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
			$config['max_size']      = '200000';
			// $config['max_width']     = '2024';
			// $config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;

			$this->load->library('upload', $config);

			$id = $this->input->post('r_id');

			if (empty($_FILES['gambar']['name'])) {

				$fdata['r_mail']		= $this->input->post('r_mail');
				$fdata['r_fullname']	= $this->input->post('r_fullname');
				$fdata['r_bday']		= $this->input->post('r_bday');
				$fdata['r_gender']		= $this->input->post('r_gender');
				$fdata['r_validate']	= $this->input->post('r_validate');
				$fdata['r_status']		= $this->input->post('r_status');
				$fdata['modified_by']	= $this->session->userdata('username');
				$fdata['modified_on']	= date('Y-m-d h:i:s');

				if (!empty($this->input->post('r_pass'))) {
					$fdata['r_pass']		= md5($this->input->post('r_pass'));
				}


				$this->Member_m->update($id, $fdata);
				$data['member']	= $this->Member_m->get_by_id($id)->row_array();

				?>
				<script type="text/javascript" language="javascript">
					alert("Data Berhasil Di Ubah !!!");
				</script>
				<?php

				redirect('server/member', 'refresh');
			} else {

				if (!$this->upload->do_upload('gambar')) {


					echo "<script>
					alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB');
					javascript:history.go(-1);</script>";
				} else {

					$fdata['r_mail']		= $this->input->post('r_mail');
					$fdata['r_fullname']	= $this->input->post('r_fullname');
					$fdata['r_bday']		= $this->input->post('r_bday');
					$fdata['r_gender']		= $this->input->post('r_gender');
					$fdata['r_validate']	= $this->input->post('r_validate');
					$fdata['r_status']		= $this->input->post('r_status');
					$fdata['r_image']	    = str_replace(" ", "_", $new_name);
					$fdata['modified_by']	= $this->session->userdata('username');
					$fdata['modified_on']	= date('Y-m-d h:i:s');


					if (!empty($this->input->post('r_pass'))) {
						$fdata['r_pass']		= md5($this->input->post('r_pass'));
					}

					$old = $this->Member_m->get_by_id($id)->row_array();
					unlink('./image/member/' . $old['r_image']);

					$this->Member_m->update($id, $fdata);
					$data['member']	= $this->Member_m->get_by_id($id)->row_array();

				?>
					<script type="text/javascript" language="javascript">
						alert("Data Berhasil Di Ubah !!!");
					</script>
			<?php

					redirect('server/member', 'refresh');
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

	function hapus($id)
	{
		$old = $this->Member_m->get_by_id($id)->row_array();
		unlink('./image/member/' . $old['r_image']);

		$this->Member_m->delete($id);

		?>
		<script type="text/javascript" language="javascript">
			alert("Data Berhasil Di Hapus !!!");
		</script>
<?php

		redirect('server/member', 'refresh');
	}
}

/* End of file Member.php */
/* Location: ./application/controllers/server/Member.php */
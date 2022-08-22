<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myprofile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->general->cekMemberLogin();
		$this->load->model('Myprofile_m');
		$maintenance = $this->db->get('tb_maintenance')->row();
		if ($maintenance->status == 0) {
			redirect('maintenance/index');
		}
	}

	function index()
	{
		$data['users']  = $this->Myprofile_m->get_by_id()->row_array();
		$data['content'] = 'myprofile_v';
		$this->load->view('template_v', $data);
	}

	function changepwd()
	{
		$data['users']  = $this->Myprofile_m->get_by_id()->row_array();
		$data['content'] = 'change_pwd_v';
		$this->load->view('template_v', $data);
	}

	function recoverypwd()
	{
		$id = $this->session->userdata('idlogin');
		$users  = $this->Myprofile_m->get_by_id()->row_array();
		$data['content'] = 'change_pwd_v';


		$old_pass	= md5($this->input->post('old_pass'));
		$new_pass1	= $this->input->post('new_pass1');
		$new_pass2	= $this->input->post('new_pass2');

		if ($users['r_pass'] == $old_pass) {
			if ($new_pass1 == $new_pass2) {
				if (strlen($new_pass1) > 5) {
					$fdata['r_pass'] = md5($this->input->post('new_pass1'));
					$edit = $this->Myprofile_m->update($id, $fdata);
?>
					<script type="text/javascript" language="javascript">
						alert("Ganti Password berhasil!");
					</script>
			<?php
					redirect('myprofile', 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Password baru minimal 6 huruf / angka!');
					redirect('myprofile/changepwd', 'refresh');
				}
			} else {
				$this->session->set_flashdata('error', 'Password baru tidak cocok!');
				redirect('myprofile/changepwd', 'refresh');
			}
		} else {
			$this->session->set_flashdata('error', 'Password lama salah!');
			redirect('myprofile/changepwd', 'refresh');
		}

		$this->load->view('template_v', $data);
	}

	function edit()
	{
		$data['users']  = $this->Myprofile_m->get_by_id()->row_array();
		$data['content'] = 'myprofile_edit_v';
		$this->load->view('template_v', $data);
	}

	function editsave()
	{
		$id = $this->session->userdata('idlogin');

		$new_name = time() . $_FILES["r_image"]['name'];
		$config['upload_path'] 	 = './image/member';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size']      = '2000';
		// $config['max_width']     = '200';
		// $config['max_height']    = '200';
		$config['file_name'] 	 = $new_name;
		$this->load->library('upload', $config);

		if (empty($_FILES['r_image']['name'])) {
			//Mengambil data dari form
			$fdata['r_fullname']	= $this->input->post('r_fullname');
			$fdata['r_mail']		= $this->input->post('r_mail');
			$fdata['r_bday']		= $this->input->post('r_bday');
			$fdata['r_gender']		= $this->input->post('r_gender');
			$fdata['modified_on']	= date('Y-m-d h:i:s');
			$fdata['modified_by']	= $this->input->post('r_fullname');


			if ($this->session->userdata('email') != $fdata['r_mail']) {
				$fdata['r_validate']	= 'N';
			} else {
				$fdata['r_validate']	= 'Y';
			}

			$edit = $this->Myprofile_m->update($id, $fdata);

			?>
			<script type="text/javascript" language="javascript">
				alert("Data Berhasil Di update");
			</script>
			<?php
			redirect('myprofile/relogin', 'refresh');
		} else {
			if (!$this->upload->do_upload('r_image')) {
				echo "<script>alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB.);</script>";
				echo "<script>javascript:history.go(-1);</script>";
			} else {
				//Mengambil data dari form
				$fdata['r_fullname']		= $this->input->post('r_fullname');
				$fdata['r_mail']		= $this->input->post('r_mail');
				$fdata['r_bday']		= $this->input->post('r_bday');
				$fdata['r_gender']		= $this->input->post('r_gender');
				$fdata['r_image']	    = str_replace(" ", "_", $new_name);
				$fdata['modified_on']	= date('Y-m-d h:i:s');
				$fdata['modified_by']	= $this->input->post('r_fullname');


				if ($this->session->userdata('email') != $fdata['r_mail']) {
					$fdata['r_validate']	= 'N';
				} else {
					$fdata['r_validate']	= 'Y';
				}

				unlink('image/member/' . $this->session->userdata('image'));

				$edit = $this->Myprofile_m->update($id, $fdata);
			?>
				<script type="text/javascript" language="javascript">
					alert("Data Berhasil Di update");
				</script>
<?php
				redirect('myprofile/relogin', 'refresh');
			}
		}
	}


	function relogin()
	{
		$user = $this->Myprofile_m->get_by_id()->row_array();

		$sessionData['idlogin']      = $user['r_id'];
		$sessionData['fullname'] 	 = $user['r_fullname'];
		$sessionData['email']        = $user['r_mail'];
		$sessionData['image']        = 'member/' . $user['r_image'];
		$sessionData['bday']       	 = $user['r_bday'];
		$sessionData['gender']  	 = $user['r_gender'];
		$sessionData['jenis']  	 	 = 'M';
		$sessionData['linkto']  	 = '';

		$sessionData['ip_login']     = $this->input->ip_address();
		$sessionData['is_login_member']     = TRUE;

		$this->session->set_userdata($sessionData);
		$this->session->set_userdata('file_manager', true);

		redirect('myprofile', 'refresh');
	}
}

/* End of file Myprofile.php */
/* Location: ./application/controllers/Myprofile.php */
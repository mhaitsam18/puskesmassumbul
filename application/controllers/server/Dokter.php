<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Dokter_m');
	}

	public function index()
	{

		$data['content'] 	= 'server/t_dokter.php';
		$data['dokter']   = $this->Dokter_m->findAll();

		$this->load->view('server/template_v', $data, FALSE);
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
			$data['action']		= site_url('server/dokter/form/aksiadd');

			if ($this->form_validation->run() == FALSE) {

				$data['dokter']['d_mail']  		= '';
				$data['dokter']['d_pass']  		= '';
				$data['dokter']['d_fullname']  	= '';
				$data['dokter']['d_bday'] 		= '';
				$data['dokter']['d_gender'] 	= '';
				$data['dokter']['d_image'] 		= '';
				$data['dokter']['d_poli'] 		= '';
				$data['dokter']['d_moto'] 		= '';
				$data['dokter']['d_phone'] 		= '';
				$data['dokter']['d_status'] 	= '';

				$data['content'] 	= "server/f_dokter";
				$data['poli'] 	= $this->db->get('tb_poli')->result_array();

				$this->load->view('server/template_v', $data, FALSE);
			} else { ?>
				<script type="text/javascript" language="javascript">
					alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
				</script>
			<?php

				echo "<script>javascript:history.go(-1);</script>";
			}
		} elseif ($mod == "edit") {

			$data['action'] 	= site_url('server/dokter/form/aksiedit/' . $id);

			if ($this->form_validation->run() == FALSE) {

				$data['dokter'] = $this->Dokter_m->get_by_id($id)->row_array();
				$data['poli']   = $this->Dokter_m->get_poli();
			} else {

			?>
				<script type="text/javascript" language="javascript">
					alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
				</script>
				<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_dokter";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		} elseif ($mod == "aksiadd") {

			$new_name = time() . $_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/dokter';
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
				if (!$this->upload->do_upload('gambar')) {
					echo "<script>alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB');</script>";
					echo "<script>javascript:history.go(-1);</script>";
				} else {
					//Mengambil data dari form
					$fdata['d_mail']		= $this->input->post('d_mail');
					$fdata['d_pass']		= md5($this->input->post('d_pass'));
					$fdata['d_fullname']	= $this->input->post('d_fullname');
					$fdata['d_bday']		= $this->input->post('d_bday');
					$fdata['d_gender']		= $this->input->post('d_gender');
					$fdata['d_image']	    = str_replace(" ", "_", $new_name);
					$fdata['d_poli']		= $this->input->post('d_poli');
					$fdata['d_moto']		= $this->input->post('d_moto');
					$fdata['d_phone']		= $this->input->post('d_phone');
					$fdata['d_status']		= $this->input->post('d_status');
					$fdata['permalink']	    = textToSlug($this->input->post('d_fullname'));
					$fdata['created_by']	= $this->session->userdata('username');
					$fdata['created_on']	= date('Y-m-d h:i:s');

					$insert = $this->Dokter_m->save($fdata);

				?>
					<script type="text/javascript" language="javascript">
						alert("Data Berhasil Di Tambahkan !!!");
					</script>

				<?php

					redirect('server/dokter', 'refresh');
				}
			}
		} elseif ($mod == "aksiedit") {
			//Mengambil data dari form
			$new_name = time() . $_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/dokter';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
			$config['max_size']      = '2000';
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;

			$this->load->library('upload', $config);

			$id = $this->input->post('d_id');

			if (empty($_FILES['gambar']['name'])) {

				if (!empty($this->input->post('d_pass'))) {
					$fdata['d_pass']		= md5($this->input->post('d_pass'));
				}

				$fdata['d_mail']		= $this->input->post('d_mail');
				$fdata['d_fullname']	= $this->input->post('d_fullname');
				$fdata['d_bday']		= $this->input->post('d_bday');
				$fdata['d_gender']		= $this->input->post('d_gender');
				$fdata['d_poli']		= $this->input->post('d_poli');
				$fdata['d_moto']		= $this->input->post('d_moto');
				$fdata['d_phone']		= $this->input->post('d_phone');
				$fdata['d_status']		= $this->input->post('d_status');
				$fdata['permalink']	    = textToSlug($this->input->post('d_fullname'));
				$fdata['modified_by']	= $this->session->userdata('username');
				$fdata['modified_on']	= date('Y-m-d h:i:s');


				$this->Dokter_m->update($id, $fdata);
				$data['dokter']	= $this->Dokter_m->get_by_id($id)->row_array();

				?>
				<script type="text/javascript" language="javascript">
					alert("Data Berhasil Di Ubah !!!");
				</script>
				<?php

				redirect('server/dokter', 'refresh');
			} else {

				if (!$this->upload->do_upload('gambar')) {


					echo "<script>
					alert('File foto yang di unggah tidak sesuai, Format harus jpg/png dan Max Ukuran 2MB');
					javascript:history.go(-1);</script>";
				} else {

					if (!empty($this->input->post('d_pass'))) {
						$fdata['d_pass']		= md5($this->input->post('d_pass'));
					}

					$fdata['d_mail']		= $this->input->post('d_mail');
					$fdata['d_fullname']	= $this->input->post('d_fullname');
					$fdata['d_bday']		= $this->input->post('d_bday');
					$fdata['d_gender']		= $this->input->post('d_gender');
					$fdata['d_poli']		= $this->input->post('d_poli');
					$fdata['d_moto']		= $this->input->post('d_moto');
					$fdata['d_phone']		= $this->input->post('d_phone');
					$fdata['d_status']		= $this->input->post('d_status');
					$fdata['d_image']	    = str_replace(" ", "_", $new_name);
					$fdata['permalink']	    = textToSlug($this->input->post('d_fullname'));
					$fdata['modified_by']	= $this->session->userdata('username');
					$fdata['modified_on']	= date('Y-m-d h:i:s');


					$old = $this->Dokter_m->get_by_id($id)->row_array();
					unlink('image/dokter/' . $old['d_image']);

					$this->Dokter_m->update($id, $fdata);
					$data['dokter']	= $this->Dokter_m->get_by_id($id)->row_array();

				?>
					<script type="text/javascript" language="javascript">
						alert("Data Berhasil Di Ubah !!!");
					</script>
			<?php

					redirect('server/dokter', 'refresh');
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


	public function janji_temu()
	{

		$data['judul'] = 'Data Janji Temu';
		$data['content'] = 'server/dokter/janji-temu.php';
		$this->db->join('tb_member', 'tb_member.r_id = tb_janji_temu.id_pasien');
		$this->db->join('tb_dokter', 'tb_dokter.d_id = tb_janji_temu.d_id');
		$data['list_janji_temu'] = $this->db->get('tb_janji_temu')->result();
		$this->load->view('server/template_v', $data, false);
	}
	public function surat_rujukan()
	{
		$data['judul'] = 'Data Surat Rujukan';
		$data['content'] = 'server/dokter/surat-rujukan.php';
		$this->db->join('tb_member', 'tb_member.r_id = tb_surat_rujukan.id_pasien');
		$this->db->join('tb_dokter', 'tb_dokter.d_id = tb_surat_rujukan.d_id');
		$data['list_surat_rujukan'] = $this->db->get('tb_surat_rujukan')->result();
		$this->load->view('server/template_v', $data, false);
	}
	public function resep()
	{
		$data['judul'] = 'Data Resep';
		$data['content'] = 'server/dokter/resep.php';
		$this->db->join('tb_member', 'tb_member.r_id = tb_resep.id_pasien');
		$this->db->join('tb_dokter', 'tb_dokter.d_id = tb_resep.id_dokter');
		$data['list_resep'] = $this->db->get('tb_resep')->result();
		$this->load->view('server/template_v', $data, false);
	}
	public function resep_obat($id_resep = null)
	{
		$data['judul'] = 'Data Resep Obat';
		$data['content'] = 'server/dokter/resep-obat.php';
		$this->db->join('tb_member', 'tb_member.r_id = tb_resep_obat.id_pasien');
		$this->db->join('tb_dokter', 'tb_dokter.d_id = tb_resep_obat.d_id');
		$data['list_resep_obat'] = $this->db->get_where('tb_resep_obat', ['id_resep' => $id_resep])->result();
		$this->load->view('server/template_v', $data, false);
	}
	public function rekam_medis()
	{
		$data['judul'] = 'Data Rekam Medis';
		$data['content'] = 'server/dokter/rekam-medis.php';
		$this->db->join('tb_member', 'tb_member.r_id = tb_rekam_medis.id_pasien');
		$this->db->join('tb_dokter', 'tb_dokter.d_id = tb_rekam_medis.id_dokter');
		$data['list_rekam_medis'] = $this->db->get('tb_rekam_medis')->result();
		$this->load->view('server/template_v', $data, false);
	}


	function jadwal()
	{

		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = $this->uri->segment(5);

		$submit1 = "Simpan";
		$submit2 = "Edit";

		if ($mod == "edit") {

			$data['action'] 	= site_url('server/dokter/jadwal/aksiedit/' . $id);

			if ($this->form_validation->run() == FALSE) {

				$jddoc = $this->Dokter_m->get_jadwal($id);

				if ($jddoc) {
					foreach ($jddoc as $r) {
						$d_hari = $r['d_hari'];
						$data['jadwal']["$d_hari"] = $r['d_jam'] . '@@' . $r['d_desc'];
					}
				}

				$data['dokter']	= $this->Dokter_m->get_by_id($id)->row_array();
			} else {

			?>
				<script type="text/javascript" language="javascript">
					alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
				</script>
			<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_j_dokter";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		} elseif ($mod == "aksiedit") {

			$id = $this->input->post('d_id');

			$d_hari = $this->input->post('d_hari');
			$d_jam	= $this->input->post('d_jam');
			$d_desc = $this->input->post('d_desc');

			$fdata = array();

			if (is_array($d_hari)) {
				foreach ($d_hari as $i => $value) {
					if (isset($d_jam[$i])) {
						$d_jam[$i] = $d_jam[$i];
					} else {
						$d_jam[$i] = '';
					}

					if (isset($d_desc[$i])) {
						$d_desc[$i] = $d_desc[$i];
					} else {
						$d_desc[$i] = '';
					}


					if ($d_jam[$i] != '' || $d_jam[$i] != '') {
						array_push($fdata, array(
							'd_id'			=> $id,
							'd_hari'		=> $d_hari[$i],
							'd_jam'			=> $d_jam[$i],
							'd_desc'		=> $d_desc[$i],
							'modified_on'	=> date('Y-m-d h:i:s'),
							'modified_by'	=> $this->session->userdata('username'),
						));
					}
				}

				// print_r($fdata);exit();

				$this->Dokter_m->del_jadwal($id);
				$this->Dokter_m->insert_multiple($fdata);
			}

			$data['dokter']	= $this->Dokter_m->get_by_id($id)->row_array();

			?>
			<script type="text/javascript" language="javascript">
				alert("Data Berhasil Di Ubah !!!");
			</script>
		<?php

			redirect('server/dokter', 'refresh');
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
		$old = $this->Dokter_m->get_by_id($id)->row_array();
		unlink('image/dokter/' . $old['d_image']);

		$this->Dokter_m->delete($id);

		?>
		<script type="text/javascript" language="javascript">
			alert("Data Berhasil Di Hapus !!!");
		</script>
<?php

		redirect('server/dokter', 'refresh');
	}
}

function textToSlug($text = '')
{
	$text = trim($text);
	if (empty($text)) return '';
	$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
	$text = strtolower(trim($text));
	$text = str_replace(' ', '-', $text);
	$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
	return $text;
}

/* End of file Dokter.php */
/* Location: ./application/controllers/server/Dokter.php */
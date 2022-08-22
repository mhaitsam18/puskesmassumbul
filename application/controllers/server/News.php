<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/News_m');
	}

	public function index()
	{

		$data['content'] 	= 'server/t_news.php';
		$data['news']   = $this->News_m->findAll();

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
			$data['action']		= site_url('server/news/form/aksiadd');

			if ($this->form_validation->run() == FALSE) {

				$data['news']['c_title']  	= '';
				$data['news']['c_intro']  	= '';
				$data['news']['c_desc']  	= '';
				$data['news']['c_flag'] 	= '';
				$data['news']['c_image'] 	= '';

				$data['content'] 	= "server/f_news";

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

			$data['action'] 	= site_url('server/news/form/aksiedit/' . $id);

			if ($this->form_validation->run() == FALSE) {

				$data['news'] = $this->News_m->get_by_id($id)->row_array();
			} else {

			?>
				<script type="text/javascript" language="javascript">
					alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
				</script>
				<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_news";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		} elseif ($mod == "aksiadd") {

			$new_name = time() . $_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/news';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
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

					echo "<script>alert('File foto yang di unggah tidak sesuai, Format harus gif/jpg/png dan Max Ukuran 2MB');</script>";
					echo "<script>javascript:history.go(-1);</script>";
				} else {

					//Mengambil data dari form
					$fdata['c_title']		= $this->input->post('c_title');
					$fdata['c_intro']		= $this->input->post('c_intro');
					$fdata['c_desc']		= $this->input->post('c_desc');
					$fdata['c_flag']		= $this->input->post('c_flag');
					$fdata['c_image']	    = str_replace(" ", "_", $new_name);
					$fdata['permalink']	    = textToSlug($this->input->post('c_title'));
					$fdata['created_by']	= $this->session->userdata('nama_lengkap');
					$fdata['created_on']	= date('Y-m-d h:i:s');

					$insert = $this->News_m->save($fdata);

				?>
					<script type="text/javascript" language="javascript">
						alert("Data Berhasil Di Tambahkan !!!");
					</script>

				<?php

					redirect('server/news', 'refresh');
				}
			}
		} elseif ($mod == "aksiedit") {

			$new_name = time() . $_FILES["gambar"]['name'];
			$config['upload_path'] 	 = './image/news';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
			$config['max_size']      = '2000';
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';
			$config['file_name'] 	 = $new_name;

			$this->load->library('upload', $config);

			$id = $this->input->post('c_id');

			if (empty($_FILES['gambar']['name'])) {

				$fdata['c_title']		= $this->input->post('c_title');
				$fdata['c_intro']		= $this->input->post('c_intro');
				$fdata['c_desc']		= $this->input->post('c_desc');
				$fdata['c_flag']		= $this->input->post('c_flag');
				$fdata['referensi']		= $this->input->post('referensi');
				$fdata['youtube']		= $this->input->post('youtube');
				$fdata['permalink']	    = textToSlug($this->input->post('c_title'));
				$fdata['modified_by']	= $this->session->userdata('username');
				$fdata['modified_on']	= date('Y-m-d h:i:s');


				$this->News_m->update($id, $fdata);
				$data['news']	= $this->News_m->get_by_id($id)->row_array();

				?>
				<script type="text/javascript" language="javascript">
					alert("Data Berhasil Di Ubah !!!");
				</script>
				<?php

				redirect('server/news', 'refresh');
			} else {

				if (!$this->upload->do_upload('gambar')) {


					echo '<script>
						alert("File foto yang di unggah tidak sesuai, Format harus gif/jpg/png dan Max Ukuran 2MB");
					javascript:history.go(-1);
					</script>';
				} else {

					$old = $this->News_m->get_by_id($id)->row_array();
					unlink('image/news/' . $old['c_image']);


					$fdata['c_title']		= $this->input->post('c_title');
					$fdata['c_intro']		= $this->input->post('c_intro');
					$fdata['c_desc']		= $this->input->post('c_desc');
					$fdata['c_flag']		= $this->input->post('c_flag');
					$fdata['referensi']		= $this->input->post('referensi');
					$fdata['youtube']		= $this->input->post('youtube');
					$fdata['c_image']	    = str_replace(" ", "_", $new_name);
					$fdata['permalink']	    = textToSlug($this->input->post('c_title'));
					$fdata['modified_by']	= $this->session->userdata('username');
					$fdata['modified_on']	= date('Y-m-d h:i:s');

					$this->News_m->update($id, $fdata);
					$data['news']	= $this->News_m->get_by_id($id)->row_array();

				?>
					<script type="text/javascript" language="javascript">
						alert("Data Berhasil Di Ubah !!!");
					</script>
			<?php

					redirect('server/news', 'refresh');
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
		$old = $this->News_m->get_by_id($id)->row_array();
		unlink('image/news/' . $old['c_image']);
		$this->News_m->delete($id);

		?>
		<script type="text/javascript" language="javascript">
			alert("Data Berhasil Di Hapus !!!");
		</script>
<?php

		redirect('server/news', 'refresh');
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
/* End of file News.php */
/* Location: ./application/controllers/server/News.php */
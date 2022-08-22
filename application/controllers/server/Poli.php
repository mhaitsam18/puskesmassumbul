<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Poli_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_poli.php';
		$data['poli']   = $this->Poli_m->findAll();

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
        	$data['action']		= site_url('server/poli/form/aksiadd');

        	if ($this->form_validation->run() == FALSE) {
        		
        		$data['poli']['poli_kode']  = '';
        		$data['poli']['poli_nama']  = '';
        		$data['poli']['poli_desc']  = '';

				$data['content'] 	= "server/f_poli";

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

			$data['action'] 	= site_url('server/poli/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['poli'] = $this->Poli_m->get_by_id($id)->row_array();

				$jdpol = $this->Poli_m->get_jadwal($id);

				if($jdpol){
					foreach ($jdpol as $r) {
						$p_hari = $r['p_hari'];
						$data['jadwal']["$p_hari"] = $r['p_jam'].'@@'.$r['p_desc'];
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

			$data['content']	= "server/f_poli";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		} elseif ($mod == "aksiadd") {
			

			//Mengambil data dari form
			$fdata['poli_kode']		= $this->input->post('poli_kode');
			$fdata['poli_nama']		= $this->input->post('poli_nama');
			$fdata['poli_desc']		= $this->input->post('poli_desc');
			$fdata['permalink']	    = textToSlug($this->input->post('poli_nama'));
			$fdata['created_by']	= $this->session->userdata('username');
			$fdata['created_on']	= date('Y-m-d h:i:s');

			$insert = $this->Poli_m->save($fdata);

			$p_hari = $this->input->post('p_hari');
			$p_jam	= $this->input->post('p_jam');
			$p_desc = $this->input->post('p_desc');

			$fjadwal = array();

			if(is_array($p_hari)){
				foreach ($p_hari as $i => $value) {
					if(isset($p_jam[$i])){
						$p_jam[$i] = $p_jam[$i];
					}else{
						$p_jam[$i] = '';
					}

					if(isset($p_desc[$i])){
						$p_desc[$i] = $p_desc[$i];
					}else{
						$p_desc[$i] = '';
					}


					if($p_jam[$i] != '' || $p_jam[$i] != ''){
						array_push($fjadwal, array(
							'p_id'			=>$this->input->post('poli_kode'),
							'p_hari'		=>$p_hari[$i],
							'p_jam'			=>$p_jam[$i], 
							'p_desc'		=>$p_desc[$i],
							'modified_on'	=>date('Y-m-d h:i:s'),
							'modified_by'	=>$this->session->userdata('username'),
						));
					}
				}

				$this->Poli_m->insert_multiple($fjadwal);
			}

			?>
            	<script type="text/javascript" language="javascript">
                	alert("Data Berhasil Di Tambahkan !!!");
            	</script>

			<?php

			redirect('server/poli','refresh');
	
		} elseif ($mod == "aksiedit") {
			//Mengambil data dari form
			$fdata['poli_kode']		= $this->input->post('poli_kode');
			$fdata['poli_nama']		= $this->input->post('poli_nama');
			$fdata['poli_desc']		= $this->input->post('poli_desc');
			$fdata['permalink']	    = textToSlug($this->input->post('poli_nama'));
			$fdata['modified_by']	= $this->session->userdata('username');
			$fdata['modified_on']	= date('Y-m-d h:i:s');

			$this->Poli_m->update($id, $fdata);
			$data['poli']	= $this->Poli_m->get_by_id($id)->row_array();


			$p_hari = $this->input->post('p_hari');
			$p_jam	= $this->input->post('p_jam');
			$p_desc = $this->input->post('p_desc');

			$fjadwal = array();

			if(is_array($p_hari)){
				foreach ($p_hari as $i => $value) {
					if(isset($p_jam[$i])){
						$p_jam[$i] = $p_jam[$i];
					}else{
						$p_jam[$i] = '';
					}

					if(isset($p_desc[$i])){
						$p_desc[$i] = $p_desc[$i];
					}else{
						$p_desc[$i] = '';
					}


					if($p_jam[$i] != '' || $p_jam[$i] != ''){
						array_push($fjadwal, array(
							'p_id'			=>$data['poli']['poli_kode'],
							'p_hari'		=>$p_hari[$i],
							'p_jam'			=>$p_jam[$i], 
							'p_desc'		=>$p_desc[$i],
							'modified_on'	=>date('Y-m-d h:i:s'),
							'modified_by'	=>$this->session->userdata('username'),
						));
					}
				}

				$this->Poli_m->del_jadwal($id);
				$this->Poli_m->insert_multiple($fjadwal);
			}
			?>
                <script type="text/javascript" language="javascript">
                    alert("Data Berhasil Di Ubah !!!");
                </script>
            <?php
            
            redirect('server/poli', 'refresh');
	
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

		$this->Poli_m->del_jadwal($id);
		$this->Poli_m->delete($id);

		?>
            <script type="text/javascript" language="javascript">
                alert("Data Berhasil Di Hapus !!!");
            </script>
        <?php
                
        redirect('server/poli', 'refresh');
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

/* End of file Poli.php */
/* Location: ./application/controllers/server/Poli.php */
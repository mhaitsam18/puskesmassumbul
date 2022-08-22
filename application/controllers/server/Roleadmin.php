<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roleadmin extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->model('server/Roleadmin_m');

	}

	public function index()
	{

		$data['content'] 	= 'server/t_roleadmin.php';
		$data['roleadmin']   = $this->Roleadmin_m->findAll();

		$this->load->view('server/template_v', $data, FALSE);
	}

	function transfer(){
		$id = $this->uri->segment(4);

		$insert = $this->Roleadmin_m->transfer_roleadmin($id);
		?>
        	<script type="text/javascript" language="javascript">
            	alert("Data user telah aktif!");
        	</script>
		<?php
		redirect('server/roleadmin','refresh');
	}

	function form() {
		$datamenu = "";
		//Ambil variable URL
		$mod = $this->uri->segment(4);
		$id  = $this->uri->segment(5);

		$menu0 = $this->Roleadmin_m->get_menu(0,$id);

		if($menu0){
			$datamenu .= '<table class="table table-bordered table-striped table-responsive nowrap">';
			$datamenu .= '<tr>';
			$datamenu .= '<th class="text-center">MENU</th>';
			$datamenu .= '<th width="100px;" class="text-center">AKSES</th>';
			$datamenu .= '</tr>';
			foreach ($menu0 as $r) {
				$menuid = $r['menu_id'];
				$menu1 = $this->Roleadmin_m->get_menu($menuid,$id);	

        		$menu_view = $r['menu_view'] == "Y" ? "checked" : "";
        		$menu_add  = $r['menu_add'] == "Y" ? "checked" : "";
        		$menu_edit = $r['menu_edit'] == "Y" ? "checked" : "";
        		$menu_del  = $r['menu_del'] == "Y" ? "checked" : "";

				if($menu1){
					$datamenu .= '<tr>';
					$datamenu .= '<td>
									<i class="'.$r['menu_icon'].'"></i> '.$r['menu_name'].'
								  	<input type="hidden" readonly name="menu_id['.$menuid.']" value="'.$menuid.'">
								  </td>';
					$datamenu .= '<td class="text-center">
									<input type="checkbox" name="menu_view['.$menuid.']" id="menu_view_'.$menuid.'" value="Y" '.$menu_view.'>


									<input type="checkbox" name="menu_add['.$menuid.']" id="menu_add_'.$menuid.'" value="Y" '.$menu_add.' style="display:none;">
									<input type="checkbox" name="menu_edit['.$menuid.']" id="menu_edit_'.$menuid.'" value="Y" '.$menu_edit.' style="display:none;">
									<input type="checkbox" name="menu_del['.$menuid.']" id="menu_del_'.$menuid.'" value="Y" '.$menu_del.' style="display:none;">
								 </td>';
					$datamenu .= '</tr>';
					foreach ($menu1 as $r2) {
						$menuid2 = $r2['menu_id'];
						$menu_view2 = $r2['menu_view'] == "Y" ? "checked" : "";
		        		$menu_add2  = $r2['menu_add'] == "Y" ? "checked" : "";
		        		$menu_edit2 = $r2['menu_edit'] == "Y" ? "checked" : "";
		        		$menu_del2  = $r2['menu_del'] == "Y" ? "checked" : "";

						$datamenu .= '<tr>';
						$datamenu .= '<td style="padding-left:30px;">
										<i class="'.$r2['menu_icon'].'"></i>  '.$r2['menu_name'].'
										<input type="hidden" readonly name="menu_id['.$menuid2.']" value="'.$menuid2.'">
									</td>';
						$datamenu .= '<td class="text-center">
										<input type="checkbox" name="menu_view['.$menuid2.']" id="menu_view_'.$menuid2.'" value="Y" '.$menu_view2.'>
									 
										<input type="checkbox" name="menu_add['.$menuid2.']" id="menu_add_'.$menuid2.'" value="Y" '.$menu_add2.' style="display:none;">
										<input type="checkbox" name="menu_edit['.$menuid2.']" id="menu_edit_'.$menuid2.'" value="Y" '.$menu_edit2.' style="display:none;">
										<input type="checkbox" name="menu_del['.$menuid2.']" id="menu_del_'.$menuid2.'" value="Y" '.$menu_del2.' style="display:none;">
									  </td>';
						$datamenu .= '</tr>';
					}
				}else{
					$datamenu .= '<tr>';
					$datamenu .= '<td>
									<i class="'.$r['menu_icon'].'"></i> '.$r['menu_name'].'
									<input type="hidden" readonly name="menu_id['.$menuid.']" value="'.$menuid.'">
								 </td>';
					$datamenu .= '<td class="text-center">
									<input type="checkbox" name="menu_view['.$menuid.']" id="menu_view_'.$menuid.'" value="Y" '.$menu_view.'>
								 
									<input type="checkbox" name="menu_add['.$menuid.']" id="menu_add_'.$menuid.'" value="Y" '.$menu_add.' style="display:none;">
									<input type="checkbox" name="menu_edit['.$menuid.']" id="menu_edit_'.$menuid.'" value="Y" '.$menu_edit.' style="display:none;">
									<input type="checkbox" name="menu_del['.$menuid.']" id="menu_del_'.$menuid.'" value="Y" '.$menu_del.' style="display:none;">
								  </td>';
					$datamenu .= '</tr>';
				}
			}
			$datamenu .= '</table>';
		}else{
			$datamenu .= 'Tidak ada menu.';
		}

		$data['ctnmenu'] = $datamenu;

		$submit1 = "Simpan";
		$submit2 = "Edit";

		if ($mod == "add") {
			
        	$data['submit']     = $submit1;
        	$data['mod']        = $mod;
        	$data['action']		= site_url('server/roleadmin/form/aksiadd');

        	if ($this->form_validation->run() == FALSE) {
        		
        		$data['roleadmin']['role_id']  		= '';
        		$data['roleadmin']['role_name']  	= '';
        		$data['roleadmin']['role_desc']  	= '';

				$data['content'] 	= "server/f_roleadmin";

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

			$data['action'] 	= site_url('server/roleadmin/form/aksiedit/'.$id);

			if ($this->form_validation->run() == FALSE) {
				
				$data['roleadmin'] = $this->Roleadmin_m->get_by_id($id)->row_array();

			} else {
				
				?>
                <script type="text/javascript" language="javascript">
                    alert("Maaf, Halaman Yang Anda Minta Tidak Tersedia !!! (ERROR 404)");
                </script>
            	<?php

				echo "<script>javascript:history.go(-1);</script>";
			}

			$data['content']	= "server/f_roleadmin";
			$data['submit']		= $submit2;
			$data['mod']        = $mod;

			$this->load->view('server/template_v', $data, FALSE);
		
		} elseif ($mod == "aksiadd") {
			//Mengambil data dari form
			$fdata['role_name']		= $this->input->post('role_name');
			$fdata['role_desc']		= $this->input->post('role_desc');
			$fdata['created_by']	= $this->session->userdata('username');
			$fdata['created_on']	= date('Y-m-d h:i:s');

			$insert = $this->Roleadmin_m->save($fdata);


			if(is_array($_REQUEST['menu_view'])){
				$datarole = array();
				foreach ($_REQUEST['menu_view'] as $i => $value) {

					$_REQUEST['menu_add'][$i]  = (isset($_REQUEST['menu_add'][$i]))  ? $_REQUEST['menu_add'][$i]  :'N';
					$_REQUEST['menu_edit'][$i] = (isset($_REQUEST['menu_edit'][$i])) ? $_REQUEST['menu_edit'][$i] :'N';
					$_REQUEST['menu_del'][$i]  = (isset($_REQUEST['menu_del'][$i]))  ? $_REQUEST['menu_del'][$i]  :'N';

					array_push($datarole, array(
						'role_id'	=>$insert,
						'menu_id'	=>$_REQUEST['menu_id'][$i],
						'menu_view'	=>$_REQUEST['menu_view'][$i],
						'menu_add'	=>$_REQUEST['menu_add'][$i],
						'menu_edit'	=>$_REQUEST['menu_edit'][$i],
						'menu_del'	=>$_REQUEST['menu_del'][$i]
					));

				}

				if(is_array($datarole)){
					$this->Roleadmin_m->insert_detilrole($datarole);
				}
			}

			?>
            	<script type="text/javascript" language="javascript">
                	alert("Data Berhasil Di Tambahkan !!!");
            	</script>

			<?php

			redirect('server/roleadmin','refresh');
		} elseif ($mod == "aksiedit") {
			$fdata['role_name']		= $this->input->post('role_name');
			$fdata['role_desc']		= $this->input->post('role_desc');
			$fdata['modified_by']	= $this->session->userdata('username');
			$fdata['modified_on']	= date('Y-m-d h:i:s');

			$this->Roleadmin_m->update($id, $fdata);
			$data['roleadmin']	= $this->Roleadmin_m->get_by_id($id)->row_array();


			if(is_array($_REQUEST['menu_view'])){
				$datarole = array();
				foreach ($_REQUEST['menu_view'] as $i => $value) {

					$_REQUEST['menu_add'][$i]  = (isset($_REQUEST['menu_add'][$i]))  ? $_REQUEST['menu_add'][$i]  :'N';
					$_REQUEST['menu_edit'][$i] = (isset($_REQUEST['menu_edit'][$i])) ? $_REQUEST['menu_edit'][$i] :'N';
					$_REQUEST['menu_del'][$i]  = (isset($_REQUEST['menu_del'][$i]))  ? $_REQUEST['menu_del'][$i]  :'N';

					array_push($datarole, array(
						'role_id'	=>$id,
						'menu_id'	=>$_REQUEST['menu_id'][$i],
						'menu_view'	=>$_REQUEST['menu_view'][$i],
						'menu_add'	=>$_REQUEST['menu_add'][$i],
						'menu_edit'	=>$_REQUEST['menu_edit'][$i],
						'menu_del'	=>$_REQUEST['menu_del'][$i]
					));

				}

				if(is_array($datarole)){
					$this->Roleadmin_m->delete_detilrole($id);
					$this->Roleadmin_m->insert_detilrole($datarole);
				}
			}

			?>
                <script type="text/javascript" language="javascript">
                    alert("Data Berhasil Di Ubah !!!");
                </script>
            <?php
            
            redirect('server/roleadmin', 'refresh');
	
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
		if($id == 1){
			?>
	            <script type="text/javascript" language="javascript">
	                alert("super-admin tidak bisa di hapus!");
	            </script>
	        <?php
		}else{
			$this->Roleadmin_m->delete_detilrole($id);
			$this->Roleadmin_m->delete($id);

			?>
	            <script type="text/javascript" language="javascript">
	                alert("Data Berhasil Di Hapus !!!");
	            </script>
	        <?php
	    }            
	        redirect('server/roleadmin', 'refresh');

	}
}

/* End of file Roleadmin.php */
/* Location: ./application/controllers/server/Roleadmin.php */
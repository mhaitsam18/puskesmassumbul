<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_m extends CI_Model {

	function get_info() {
		$this->db->where('c_name', $this->uri->segment(3));
		$data = $this->db->get('tb_identitas', 1)->row_array();
		return $data['c_value'];
	}
}

/* End of file Profile_m.php */
/* Location: ./application/models/Profile_m.php */
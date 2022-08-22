<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo_m extends CI_Model {

	private $table_name 	= "tb_identitas";
	private $primary_key 	= "c_name";

	function get_by_id($id) {
		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table_name);
	}

	function update($id, $person) {

		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $person);
	}

}

/* End of file Logo_m.php */
/* Location: ./application/models/server/Logo_m.php */
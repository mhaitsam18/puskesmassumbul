<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_m extends CI_Model {

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

/* End of file Identitas_m.php */
/* Location: ./application/models/server/Identitas_m.php */
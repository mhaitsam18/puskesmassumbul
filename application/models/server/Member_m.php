<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_m extends CI_Model {

	private $table_name 	= "tb_member";
	private $primary_key 	= "r_id";

	function findAll() {

		$this->db->order_by('r_fullname', 'asc');
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() > 0) {
			
			return $query->result_array();
		}
	}

	function get_by_id($id) {

		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table_name);
	}

	function save($person) {

		$this->db->insert($this->table_name, $person);
		return $this->db->insert_id();
	}

	function update($id, $person) {

		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $person);
	}

	function delete($id) {
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table_name);
	}
}

/* End of file Member_m.php */
/* Location: ./application/models/server/Member_m.php */
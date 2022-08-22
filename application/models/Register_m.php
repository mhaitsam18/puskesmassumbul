<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_m extends CI_Model {

	private $table = "tb_member";
	private $primary_key = "r_mail";

	function save($person) {

		$this->db->insert($this->table, $person);
		return $this->db->insert_id();
	}

	function cek_dup($id) {
		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table);
	}

	function changeActiveState($key) {

		$data = array(
		 	'active' => '1'
		);

		$this->db->where('md5(id_registrasi)', $key);
		$this->db->update($this->table, $data);

		return true;
	}

	//Proses Login User

	function checkLogin($email, $password) {

        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('active', '1');
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {

            return $query->row_array();
        }
    }

}

/* End of file Register_m.php */
/* Location: ./application/models/Register_m.php */
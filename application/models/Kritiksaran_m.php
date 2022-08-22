<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kritiksaran_m extends CI_Model {

	private $table = "tb_kritik_saran";

	function save($person) {

		$this->db->insert($this->table, $person);
		return $this->db->insert_id();
	}

}

/* End of file kritiksaran_m.php */
/* Location: ./application/models/kritiksaran_m.php */
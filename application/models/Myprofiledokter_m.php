<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myprofiledokter_m extends CI_Model {

    private $table_name     = "tb_dokter";
    private $primary_key    = "d_id";

    function get_by_id() {
        
        $id = $this->session->userdata('idlogin');
        
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->table_name);

    }

    function update($id, $person) {
		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $person);
	}
}

/* End of file Myprofiledokter_m.php */
/* Location: ./application/models/server/Myprofiledokter_m.php */
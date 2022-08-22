<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karir_m extends CI_Model {

    private $table_name     = "tb_karir";
    private $primary_key    = "c_id";

    function getData() {
        $this->db->order_by($this->primary_key, 'desc');
        return $this->db->get($this->table_name, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
}

/* End of file Karir_m.php */
/* Location: ./application/models/Karir_m.php */
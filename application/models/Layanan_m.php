<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_m extends CI_Model {

    private $table_name     = "tb_layanan";
    private $primary_key    = "c_id";


    function getLayPublish() {
        $this->db->order_by($this->primary_key, 'desc');
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getLayByPermalink($permalink) {
        $this->db->where('permalink', $permalink);
        $this->db->order_by($this->primary_key, 'desc');
        
        return $this->db->get($this->table_name, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

}

/* End of file Layanan_m.php */
/* Location: ./application/models/server/Layanan_m.php */
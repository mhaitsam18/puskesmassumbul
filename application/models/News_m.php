<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_m extends CI_Model {

    private $table_name     = "tb_news";
    private $primary_key    = "c_id";


    function getNewsPublish($perPage = 500, $offset = 0, $key = null) {

        $this->db->where('c_flag', 1);
        $this->db->order_by($this->primary_key, 'desc');

        $this->db->limit($perPage, $offset);

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }
    }


    function getNewsCariPublish($perPage = 500,$offset = 0, $key = null) {
        
        if(!empty($this->input->get('cari'))){
            $keyCari = $this->input->get('cari');
        }else{
            $keyCari = $this->uri->segment(3);
        }

        $this->db->where('c_flag', 1);


        if ($keyCari != null) {

            $this->db->like('c_title', $keyCari);
            $this->db->or_like('c_desc', $keyCari);

        }   

        $this->db->order_by($this->primary_key, 'desc');
        $this->db->limit($perPage, $offset);
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

    }

    function findRecentNews() {
        $this->db->order_by($this->primary_key, 'desc');
        $this->db->where('c_flag', 1);
        $query = $this->db->get($this->table_name, 5);

        if ($query->num_rows() > 0) {
            
            return $query->result_array();
        }
    }


    function geNewsByPermalink($permalink) {
        $this->db->where('c_flag', 1);
        $this->db->where('permalink', $permalink);
        $this->db->order_by($this->primary_key, 'desc');
        
        return $this->db->get($this->table_name, 1);
        
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
}

/* End of file News_m.php */
/* Location: ./application/models/server/News_m.php */
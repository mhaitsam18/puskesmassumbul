<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

	var $table = 'tb_login';

    var $level = array(
        1 => 'Administrator',
        0 => 'User'
    );

    var $status = array(
        1 => 'Aktif',
        0 => 'Tidak Aktif'
    );

    function checkLogin($username, $password) {

        $this->db->select('*');

        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
 
        $query = $this->db->get($this->table);

        if ($query->num_rows() == 1) {

            return $query->row_array();
        }
    }

	function updateLastLogin($id_users) {
        $data = array(
            'last_login' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_users', $id_users);
        $this->db->update($this->table, $data);
    }

    function findAll() {
        $this->db->order_by('level', 'desc');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function regisAll() {

        $this->db->select('*');
        $this->db->order_by('id_registrasi', 'asc');
        $query = $this->db->get('tb_registrasi');

        if ($query->num_rows() > 0) {
            
            return $query->result_array();
        }
    }

}

/* End of file Login_m.php */
/* Location: ./application/models/server/Login_m.php */
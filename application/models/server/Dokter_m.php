<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_m extends CI_Model
{

	private $table_name 	= "tb_dokter";
	private $primary_key 	= "d_id";

	function findAll()
	{

		$this->db->select('a.*, b.poli_nama');
		$this->db->join('tb_poli b', 'a.d_poli = b.poli_kode', 'left');
		$this->db->order_by('a.d_fullname', 'asc');
		$query = $this->db->get($this->table_name . ' a');

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	function get_poli()
	{
		$this->db->order_by('poli_nama', 'asc');
		$query = $this->db->get('tb_poli');

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	function insert_multiple($data)
	{
		$this->db->insert_batch('tb_jadwal_dokter', $data);
	}

	function del_jadwal($id)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->delete('tb_jadwal_dokter');
	}

	function get_jadwal($id)
	{
		$this->db->select('a.d_id, b.d_hari, b.d_jam, b.d_desc');
		$this->db->join('tb_jadwal_dokter b', 'a.d_id = b.d_id', 'left');
		$this->db->where('a.d_id', $id);
		$this->db->order_by('a.d_id', 'asc');
		$this->db->order_by('b.d_hari', 'asc');
		$query = $this->db->get($this->table_name . ' a');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
	}

	function get_by_id($id)
	{
		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table_name);
	}

	function save($person)
	{

		$this->db->insert($this->table_name, $person);
		return $this->db->insert_id();
	}

	function update($id, $person)
	{

		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $person);
	}

	function delete($id)
	{
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table_name);
	}
}

/* End of file Dokter_m.php */
/* Location: ./application/models/server/Dokter_m.php */
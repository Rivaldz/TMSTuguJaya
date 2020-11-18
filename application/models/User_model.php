<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getDataUserByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		return $query->row();
	}

	public function getDataBos()
	{
		$this->db->where('role', 1);
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function getDataKaryawan()
	{
		$this->db->where('role', 4);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	
	public function cekLogin($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->num_rows();
    }
    
}
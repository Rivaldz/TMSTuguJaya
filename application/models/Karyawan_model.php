<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

	public function getDataKaryawanAll()
	{
		$this->db->where('role != 1');
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function getDataKaryawan()
	{
		$this->db->where('role',4);
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function addKaryawan()
	{
		$object = array('nama' => $this->input->post('nama_karyawan'),
						'alamat' => $this->input->post('alamat'),
						'email' => $this->input->post('email'),
						'no_telp' => $this->input->post('no_telp'),
						'username' => $this->input->post('username'),
						'password' => md5($this->input->post('password')),
						'role' => $this->input->post('role'));
		$this->db->insert("user", $object);
	}

	public function editKaryawan($id)
	{
		$object = array('nama' => $this->input->post('nama_karyawan'),
						'alamat' => $this->input->post('alamat'),
						'email' => $this->input->post('email'),
						'no_telp' => $this->input->post('no_telp'),
						'username' => $this->input->post('username'),
						'role' => $this->input->post('role'));
		if($this->input->post('password')!=null){
			$object['password']=$this->input->post('password');
		}
		$this->db->where('id_user', $id);
		$this->db->update("user", $object);
	}

	public function deleteKaryawan($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete("user");
	}
    
}
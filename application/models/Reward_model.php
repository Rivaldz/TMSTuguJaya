<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward_model extends CI_Model {

	public function getDataRewardAll()
	{
		$query = $this->db->get('reward');
		return $query->result_array();
	}

	public function addReward()
	{
		$object = array('nama_reward' => $this->input->post('nama_reward'),
						'deskripsi' => $this->input->post('deskripsi'),
						'poin' => $this->input->post('poin'),
						'stok' => $this->input->post('stok'));
		$this->db->insert("reward", $object);
	}

	public function editReward($id)
	{
		$object = array('nama_reward' => $this->input->post('nama_reward'),
						'deskripsi' => $this->input->post('deskripsi'),
						'poin' => $this->input->post('poin'),
						'stok' => $this->input->post('stok'));
		$this->db->where('id_reward', $id);
		$this->db->update("reward", $object);
	}

	public function deleteReward($id)
	{
		$this->db->where('id_reward', $id);
		$this->db->delete("reward");
	}
    
}
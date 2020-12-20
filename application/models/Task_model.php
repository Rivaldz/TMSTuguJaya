<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

	public function getDataTaskAll()
	{
		$query = $this->db->get('task');
		return $query->result_array();
	}

	public function getDataTaskRecentById($id_user)
	{
		$this->db->select('task.*, user.*');
		$this->db->join('user','user.id_user=task.ke');
		$this->db->where('task.ke',$id_user);
		$this->db->where('task.status',0);
		$this->db->or_where('task.status',1);
		$query = $this->db->get('task');
		return $query->result_array();
	}

	public function getDataTaskHistoryById($id_user)
	{
		$this->db->select('task.*, user.*');
		$this->db->join('user','user.id_user=task.ke');
		$this->db->where('task.ke',$id_user);
		$this->db->where('task.status',2);
		$query = $this->db->get('task');
		return $query->result_array();
	}

	public function addTask()
	{
		$object = array('nama_task' => $this->input->post('nama_task'),
						'deskripsi' => $this->input->post('deskripsi'),
						'dari' => $this->input->post('dari'),
						'ke' => $this->input->post('ke'),
                        'poin' => $this->input->post('poin'),
                        'created_at' => date('Y-m-d h:i:s'),
						'deadline' => $this->input->post('deadline'));

		$this->db->insert("task", $object);
	}
	
	public function addTaskBos()
	{
		$object = array('nama_task' => $this->input->post('nama_task'),
						'deskripsi' => $this->input->post('deskripsi'),
						'dari' => $this->session->userdata('id_user'),
						'ke' => $this->session->userdata('id_user'),
                        'poin' => 0,
                        'created_at' => date('Y-m-d h:i:s'),
                        'deadline' => $this->input->post('deadline'));
		$this->db->insert("task", $object);
	}

	public function editTask($id)
	{
		$object = array('nama_task' => $this->input->post('nama_task'),
						'deskripsi' => $this->input->post('deskripsi'),
						'dari' => $this->input->post('dari'),
						'ke' => $this->input->post('ke'),
                        'poin' => $this->input->post('poin'),
                        'deadline' => $this->input->post('deadline'));
		$this->db->where('id_task', $id);
		$this->db->update("task", $object);
	}

	public function updateStatusTask($stat, $id_task)
	{
		if($stat=='start'){
			$object = array('status' => 1);
		}
		else if($stat=='finish'){
			$object = array('status' => 2);
		}
		else if ($stat == "end") {
			$object = array("status" => 3);
		}
		$this->db->where('id_task', $id_task);
		$this->db->update("task", $object);
	}

	public function deleteTask($id)
	{
		$this->db->where('id_task', $id);
		$this->db->delete("task");
	}
    
}
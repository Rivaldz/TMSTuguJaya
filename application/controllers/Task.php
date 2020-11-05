<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Task_model');
		$this->load->model('User_model');
		$this->load->library('form_validation');

		// if (empty($this->session->Videodata('Video_id'))) {
		// 	redirect(base_url().'index.php/login');
		// }

	}

	public function index()
	{
        $data['title'] = "Data Task";
		$data['task'] = $this->Task_model->getDataTaskAll();
		$data['bos'] = $this->User_model->getDataBos();
		$data['karyawan'] = $this->User_model->getDataKaryawan();
		$data['content'] = $this->load->view('task/list_task',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function taskBos()
	{
		$data['title'] = "My Task";
		$data['recent'] = $this->Task_model->getDataTaskRecentById($this->session->userdata('id_user'));
		$data['history'] = $this->Task_model->getDataTaskHistoryById($this->session->userdata('id_user'));
		$data['content'] = $this->load->view('task/task_bos',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function startTask($id_task)
	{
		$this->Task_model->updateStatusTask('start',$id_task);
		redirect(base_url().'Task/taskBos');
	}

	public function finishTask($id_task)
	{
		$this->Task_model->updateStatusTask('finish',$id_task);
		redirect(base_url().'Task');
	}

	public function addTask()
	{
		$this->form_validation->set_rules('nama_task', 'Nama Task', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Task', 'trim|required');
        $this->form_validation->set_rules('poin', 'Poin Task', 'trim|required');
        $this->form_validation->set_rules('deadline', 'Deadline Task', 'trim|required');

		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}
		else
		{
		    $this->Task_model->addTask();
    		redirect(base_url().'Task');
		}
	}

	public function addTaskBos()
	{
		$this->form_validation->set_rules('nama_task', 'Nama Task', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Task', 'trim|required');
        $this->form_validation->set_rules('deadline', 'Deadline Task', 'trim|required');

		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}
		else
		{
		    $this->Task_model->addTaskBos();
    		redirect(base_url().'Task/taskBos');
		}
	}

	public function editTask($id)
	{
		$this->form_validation->set_rules('nama_task', 'Nama Task', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Task', 'trim|required');
        $this->form_validation->set_rules('poin', 'Poin Task', 'trim|required');
        $this->form_validation->set_rules('deadline', 'Deadline Task', 'trim|required');

		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}
		else
		{
		    $this->Task_model->editTask($id);
    		redirect(base_url().'Task');
		}
	}

	public function deleteTask($id)
	{
		$this->Task_model->deleteTask($id);
		redirect(base_url().'Task');
	}

}

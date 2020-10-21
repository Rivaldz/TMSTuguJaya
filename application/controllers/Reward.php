<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Reward_model');
		$this->load->library('form_validation');

		// if (empty($this->session->Videodata('Video_id'))) {
		// 	redirect(base_url().'index.php/login');
		// }

	}

	public function index()
	{
        $data['title'] = "Data Reward";
        $data['reward'] = $this->Reward_model->getDataRewardAll();
		$data['content'] = $this->load->view('reward/list_reward',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function addReward()
	{
		$this->form_validation->set_rules('nama_reward', 'Nama Reward', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Reward', 'trim|required');
		$this->form_validation->set_rules('poin', 'Poin Reward', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stok Reward', 'trim|required');

		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}
		else
		{
		    $this->Reward_model->addReward();
    		redirect(base_url().'Reward');
		}
	}

	public function editReward($id)
	{
		$this->form_validation->set_rules('nama_reward', 'Nama Reward', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Reward', 'trim|required');
		$this->form_validation->set_rules('poin', 'Poin Reward', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stok Reward', 'trim|required');

		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}
		else
		{
		    $this->Reward_model->editReward($id);
    		redirect(base_url().'Reward');
		}
	}

	public function deleteReward($id)
	{
		$this->Reward_model->deleteReward($id);
		redirect(base_url().'Reward');
	}

}

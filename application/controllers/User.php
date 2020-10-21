<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model');
		$this->load->library('form_validation');

		// if (empty($this->session->Videodata('Video_id'))) {
		// 	redirect(base_url().'index.php/login');
		// }

	}

	public function index()
	{
		$this->load->view('element/login');
	}

	public function login()
	{
		if (isset($_POST['login'])) {
    		$username = $this->input->post('username');
    		$password = md5($this->input->post('password'));
    		$cek = $this->User_model->cekLogin($username, $password);
    
    		if ($cek == 1) {
    			$show = $this->User_model->getDataUserByUsername($username);
    			$dlogin = array('role'=>$show->role,
								'username'=>$show->username,
								'nama'=>$show->nama,
								'email'=>$show->email,
								'id_user'=>$show->id_user);
    			$this->session->set_userdata($dlogin);
    			redirect(base_url().'Dashboard');
    		}
    		else
    		{
    			redirect(base_url());
    		}
	    } else {
			$this->load->view('element/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

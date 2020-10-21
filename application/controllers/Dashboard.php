<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $data['title'] = "Dashboard";
		$data['content'] = $this->load->view('dashboard',$data, TRUE);
		$this->load->view('element/main', $data);
	}
}

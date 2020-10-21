<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Karyawan_model');
		$this->load->library('form_validation');

		// if (empty($this->session->Videodata('Video_id'))) {
		// 	redirect(base_url().'index.php/login');
		// }

	}

	public function index()
	{
        $data['title'] = "Data Karyawan";
        $data['karyawan'] = $this->Karyawan_model->getDataKaryawanAll();
		$data['content'] = $this->load->view('karyawan/list_karyawan',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function listKaryawan()
	{
        $data['title'] = "Data Karyawan";
        $data['karyawan'] = $this->Karyawan_model->getDataKaryawan();
		$data['content'] = $this->load->view('karyawan/daftar_karyawan',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function addKaryawan()
	{
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Karyawan', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Karyawan', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon Karyawan', 'trim|required');
		$this->form_validation->set_rules('username', 'Username Karyawan', 'trim|required');
		$this->form_validation->set_rules('password', 'Password Karyawan', 'trim|required');

		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}
		else
		{
		    $this->Karyawan_model->addKaryawan();
    		redirect(base_url().'Karyawan');
		}
	}

	public function editKaryawan($id)
	{
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Karyawan', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Karyawan', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon Karyawan', 'trim|required');
		$this->form_validation->set_rules('username', 'Username Karyawan', 'trim|required');

		if ($this->form_validation->run()==FALSE) {
			$this->index();
		}
		else
		{
		    $this->Karyawan_model->editKaryawan($id);
    		redirect(base_url().'Karyawan');
		}
	}

	public function deleteKaryawan($id)
	{
		$this->Karyawan_model->deleteKaryawan($id);
		redirect(base_url().'Karyawan');
	}

}

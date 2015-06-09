<?php

class welcome extends CI_Controller 
{

	function __construct(){
		parent::__construct();
		$this->load->language('projetos');
	}

	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/login');
		} else {

			$options = array(
				'user_field' => $this->input->post('email'),
				'pass_field' => $this->input->post('senha')
			);

			if($this->login->autentica($options)){
				redirect('dashboard');
			} else {
				redirect('welcome');
			}
		}
	}

	public function logout()
	{
		if($this->login->logout()){
			redirect('welcome');
		} else {
			redirect('projetos');
		}
	}

	public function dashboard()
	{

		$this->login->protect();
		
		$this->load->view('layout/header');
        $this->load->view('welcome/dashboard');//, array('query' => $query, 'status' => $status));
        $this->load->view('layout/footer');
	}

}
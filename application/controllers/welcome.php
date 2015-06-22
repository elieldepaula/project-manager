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
				redirect('projetos');
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
	
	public function cadastro()
    {
        
		$this->form_validation->set_rules('nome', $this->lang->line('proj_name'), 'required');
        $this->form_validation->set_rules('funcao', $this->lang->line('proj_function'), 'required');
        $this->form_validation->set_rules('email', $this->lang->line('proj_email'), 'required');
        $this->form_validation->set_rules('senha', $this->lang->line('proj_pass'), 'required');
        if ($this->form_validation->run() == FALSE) {
			$this->load->view('usuarios/cadastro');
        } else {
			$this->load->model('usuario');
            $dados = array(
                'nome' => $this->input->post('nome'),
                'funcao' => $this->input->post('funcao'),
                'email' => $this->input->post('email'),
                'senha' => md5($this->input->post('senha')),
            );
            if($this->usuario->save($dados)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_add_success'));
                redirect('welcome');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_add_error'));
                redirect('welcome');
            }
        }
    }

}
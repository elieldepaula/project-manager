<?php

class welcome extends CI_Controller 
{

	var $status = array();

	function __construct(){

		parent::__construct();
		
		$this->load->language('projetos');

		$this->status = array(
            '0' => '<span class="label label-danger">'.$this->lang->line('proj_closed').'</span>',
            '1' => '<span class="label label-success">'.$this->lang->line('proj_open').'</span>', 
            '2' => '<span class="label label-warning">'.$this->lang->line('proj_inprogress').'</span>',
        );

	}

	public function index()
	{

		$this->login->protect();

		$this->load->model('tarefa');
		//$query = $this->tarefa->get_by_field('usuario_id', $this->login->get_userid(), array('field'=>'fim', 'order'=>'asc'))->result();
		$query = $this->tarefa->list_dashboard($this->login->get_userid())->result();

		//print_r($query);

		$this->load->view('layout/header');
        $this->load->view('layout/dashboard', array('query' => $query, 'status' => $this->status));
        $this->load->view('layout/footer');

	}

	public function login()
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
				redirect('welcome');
			} else {
				redirect('login');
			}
		}
	}

	public function logout()
	{
		if($this->login->logout()){
			redirect('welcome/login');
		} else {
			redirect('welcome');
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
                redirect('login');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_add_error'));
                redirect('login');
            }
        }
    }

}
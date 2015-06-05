<?php

class usuarios extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->language('projetos');
        $this->load->model('usuario');

        $this->login->protect();
        
    }

    public function index()
    {
        
        $query = $this->usuario->get_list()->result();
        
        $this->load->view('layout/header');
        $this->load->view('usuarios/index', array('query' => $query));
        $this->load->view('layout/footer');
    }
    
    public function add()
    {
        $this->form_validation->set_rules('nome', $this->lang->line('proj_name'), 'required');
        $this->form_validation->set_rules('funcao', $this->lang->line('proj_function'), 'required');
        $this->form_validation->set_rules('email', $this->lang->line('proj_email'), 'required');
        $this->form_validation->set_rules('senha', $this->lang->line('proj_pass'), 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('usuarios/add');
            $this->load->view('layout/footer');
        } else {
            $dados = array(
                'nome' => $this->input->post('nome'),
                'funcao' => $this->input->post('funcao'),
                'email' => $this->input->post('email'),
                'senha' => md5($this->input->post('senha')),
            );
            if($this->usuario->save($dados)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_add_success'));
                redirect('usuarios');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_add_error'));
                redirect('usuarios');
            }
        }
    }

    public function edit($usuario_id = null)
    {
        
        if($usuario_id == null)
            redirect('usuarios');

        $this->form_validation->set_rules('nome', $this->lang->line('proj_name'), 'required');
        $this->form_validation->set_rules('funcao', $this->lang->line('proj_function'), 'required');
        $this->form_validation->set_rules('email', $this->lang->line('proj_email'), 'required');
        // Verifica se deve alterar a senha.
        if($this->input->post('alterar_senha') == '1')
            $this->form_validation->set_rules('senha', $this->lang->line('proj_pass'), 'required');

        if ($this->form_validation->run() == FALSE) {

            $usuario = $this->usuario->get_by_id($usuario_id)->row();

            $this->load->view('layout/header');
            $this->load->view('usuarios/edit', array('usuario'=>$usuario));
            $this->load->view('layout/footer');
        } else {

            $dados = array();
            $dados['nome'] = $this->input->post('nome');
            $dados['funcao'] = $this->input->post('funcao');
            $dados['email'] = $this->input->post('email');
            // Verifica se deve alterar a senha.
            if($this->input->post('alterar_senha') == '1')
                $dados['senha'] = md5($this->input->post('senha'));
            
            if($this->usuario->update($usuario_id, $dados)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_edit_success'));
                redirect('usuarios');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_edit_error'));
                redirect('usuarios');
            }
        }
    }

    public function del($usuario_id = null)
    {
        if($usuario_id == null) {
            $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_del_error'));
            redirect('usuarios');
        } else {
            if($this->usuario->delete($usuario_id)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_del_success'));
                redirect('usuarios');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_user_del_error'));
                redirect('usuarios');
            }
        }
    }

}

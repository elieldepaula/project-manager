<?php

class projetos extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->language('projetos');
        $this->load->model('projeto');

        $this->login->protect();

    }

    public function index()
    {

        $query = $this->projeto->get_list()->result();
        $status = array(
            '1' => '<span class="label label-success">'.$this->lang->line('proj_open').'</span>', 
            '0' => '<span class="label label-danger">'.$this->lang->line('proj_closed').'</span>'
        );

        $this->load->view('layout/header');
        $this->load->view('projetos/index', array('query' => $query, 'status' => $status));
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('titulo', $this->lang->line('proj_title'), 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('usuario');
            $usuarios = $this->usuario->get_list()->result();
            $this->load->view('layout/header');
            $this->load->view('projetos/add', array('usuarios' => $usuarios));
            $this->load->view('layout/footer');
        } else {
            $dados = array(
                'usuario_id' => $this->input->post('usuario_id'),
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'inincio' => mdate('%Y-%d-%m', strtotime($this->input->post('inincio'))),
                'fim' => mdate('%Y-%d-%m', strtotime($this->input->post('fim'))),
                'status' => $this->input->post('status')
            );
            if($this->projeto->save($dados)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_add_success'));
                redirect('projetos');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_add_error'));
                redirect('projetos');
            }
        }
    }

    public function edit($projeto_id = null)
    {
        $this->form_validation->set_rules('titulo', $this->lang->line('proj_title'), 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $projeto = $this->projeto->get_by_id($projeto_id)->row();
            
            $this->load->view('layout/header');
            $this->load->view('projetos/edit', array('projeto'=>$projeto));
            $this->load->view('layout/footer');
            
        } else {
            $dados = array(
                'usuario_id' => $this->input->post('usuario_id'),
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'inincio' => mdate('%Y-%d-%m', strtotime($this->input->post('inincio'))),
                'fim' => mdate('%Y-%d-%m', strtotime($this->input->post('fim'))),
                'status' => $this->input->post('status')
            );
            if($this->projeto->update($projeto_id, $dados)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_edit_success'));
                redirect('projetos');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_edit_error'));
                redirect('projetos');
            }
        }
    }

    public function del($projeto_id = null)
    {
        if($projeto_id == null) {
            $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_del_error'));
            redirect('projetos');
        } else {
            if($this->projeto->delete($projeto_id)) {
                // Apaga todas as tarefas do projeto.
                $this->load->model('tarefa');
                $this->tarefa->delete_by_projeto($projeto_id);
                
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_del_success'));
                redirect('projetos');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_del_error'));
                redirect('projetos');
            }
        }
    }
    
    public function close($projeto_id = null) 
    {
        if($projeto_id == null) {
            $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_close_error'));
            redirect('projetos');
        } else {
            if($this->projeto->close($projeto_id)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_close_success'));
                redirect('projetos');
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_proj_close_error'));
                redirect('projetos');
            }
        }
    }

}

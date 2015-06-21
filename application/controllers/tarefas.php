<?php

class tarefas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->language('projetos');
        $this->load->model('tarefa');

        $this->login->protect();
        
    }

    public function index($projeto_id = null)
    {
        if($projeto_id == null)redirect('projetos');
        $this->load->model('projeto');
        $projeto = $this->projeto->get_by_id($projeto_id)->row();
        $query = $this->tarefa->get_by_field('projeto_id', $projeto_id)->result();
        $status = array(
            '1' => '<span class="label label-success">'.$this->lang->line('proj_open').'</span>', 
            '0' => '<span class="label label-danger">'.$this->lang->line('proj_closed').'</span>'
        );
        
        $this->load->view('layout/header');
        $this->load->view(
                'tarefas/index', 
                array(
                    'projeto_id' => $projeto_id, 
                    'query' => $query, 
                    'projeto' => $projeto, 
                    'status' => $status
                )
            );
        $this->load->view('layout/footer');
    }

    public function add($projeto_id = null)
    {
        if($projeto_id == null)redirect('tarefas');
        
        $this->load->model('usuario');
        $usuarios = $this->usuario->get_list()->result();
        
        $this->form_validation->set_rules('descricao', $this->lang->line('proj_description'), 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('layout/header');
            $this->load->view(
                    'tarefas/add', 
                    array(
                        'projeto_id' => $projeto_id,
                        'usuarios' => $usuarios
                    )
                );
            $this->load->view('layout/footer');
            
        } else {
            $dados = array(
                'usuario_id' => $this->input->post('usuario_id'),
                'projeto_id' => $this->input->post('projeto_id'),
                'descricao' => $this->input->post('descricao'),
                'inicio' => date_for_mysql($this->input->post('inicio')),
                'fim' => date_for_mysql($this->input->post('fim')),
                'status' => $this->input->post('status')
            );
            if($this->tarefa->save($dados)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_add_success'));
                redirect('tarefas/index/'.$this->input->post('projeto_id'));
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_add_error'));
                redirect('tarefas/index/'.$this->input->post('projeto_id'));
            }
        }
    }

    public function follow($tarefa_id = null)
    {
        $this->load->model('mensagem');
        $this->form_validation->set_rules('mensagem',  $this->lang->line('proj_message'), 'required');
        
        if ($this->form_validation->run() == FALSE) {
            
            $mensagens = $this->mensagem->get_by_field('tarefa_id', $tarefa_id)->result();
            $tarefa = $this->tarefa->get_by_id($tarefa_id)->row();

            $status = array(
                '1' => '<span class="label label-success">'.$this->lang->line('proj_open').'</span>', 
                '0' => '<span class="label label-danger">'.$this->lang->line('proj_closed').'</span>'
            );

            $this->load->view('layout/header');
            $this->load->view('tarefas/follow', array('tarefa'=>$tarefa, 'mensagens'=>$mensagens, 'status'=>$status));
            $this->load->view('layout/footer');

        } else {
            $dados = array(
                'tarefa_id' => $tarefa_id,
                'usuario_id' => $this->login->get_userid(),
                'mensagem' => $this->input->post('mensagem')
            );
            if($this->mensagem->save($dados))
            {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_add_follow_success'));
                redirect('tarefas/follow/'.$tarefa_id);
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_add_follow_error'));
                redirect('tarefas/follow/'.$tarefa_id);
            }
        }
    }

    public function edit($tarefa_id = null)
    {
        
        $this->form_validation->set_rules('descricao',  $this->lang->line('proj_description'), 'required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->load->model('usuario');
            $usuarios = $this->usuario->get_list()->result();
            $tarefa = $this->tarefa->get_by_id($tarefa_id)->row();

            $this->load->view('layout/header');
            $this->load->view('tarefas/edit', array('tarefa'=>$tarefa, 'usuarios'=>$usuarios));
            $this->load->view('layout/footer');

        } else {
            $dados = array(
                'usuario_id' => $this->input->post('usuario_id'),
                'descricao' => $this->input->post('descricao'),
                'inicio' => date_for_mysql($this->input->post('inicio')),
                'fim' => date_for_mysql($this->input->post('fim')),
                'status' => $this->input->post('status')
            );
            if($this->tarefa->update($tarefa_id, $dados)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_edit_success'));
                redirect('tarefas/index/'.$this->input->post('projeto_id'));
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_edit_error'));
                redirect('tarefas/index/'.$this->input->post('projeto_id'));
            }
        }
    }

    public function del($projeto_id = null, $tarefa_id = null)
    {
        if($tarefa_id == null) {
            $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_del_error'));
            redirect('projetos');
        } else {
            if($this->tarefa->delete($tarefa_id)) {

                // Apaga todas as mensagens da tarefa.
                $this->load->model('mensagem');
                $this->mensagem->delete_by_tarefa($tarefa_id);

                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_del_success'));
                redirect('tarefas/index/'.$projeto_id);
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_del_error'));
                redirect('tarefas/index/'.$projeto_id);
            }
        }
    }

    public function close($projeto_id = null, $tarefa_id = null) 
    {
        if($tarefa_id == null) {
            $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_close_error'));
            redirect('projetos');
        } else {
            if($this->tarefa->close($tarefa_id)) {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_close_success'));
                redirect('tarefas/index/'.$projeto_id);
            } else {
                $this->session->set_flashdata('msg', $this->lang->line('proj_msg_task_close_error'));
                redirect('tarefas/index/'.$projeto_id);
            }
        }
    }

}

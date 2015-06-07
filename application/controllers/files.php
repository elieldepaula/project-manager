<?php

class files extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->language('projetos');
        $this->load->model('file');

        $this->login->protect();

    }

    public function index($projeto_id = null)
    {

        $query = $this->file->get_by_field('projeto_id', $projeto_id)->result();
        $status = array(
            '1' => '<span class="label label-success">'.$this->lang->line('proj_open').'</span>', 
            '0' => '<span class="label label-danger">'.$this->lang->line('proj_closed').'</span>'
        );

        $this->load->view('layout/header');
        $this->load->view(
            'files/index', 
            array('query' => $query, 'status' => $status, 'projeto_id'=>$projeto_id
            )
        );
        $this->load->view('layout/footer');
    }

}
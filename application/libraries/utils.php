<?php

class utils
{

	private $CI;

	public function __construct($config = array()) {
		if (count($config) > 0) {
			$this->initialize($config);
		}
		log_message('debug', "Utils Class Initialized");
	}

	public function __get($var) {
		return get_instance()->$var;
	}

	public function get_total_tasks($projeto_id)
	{
		$this->load->model('tarefa');
		return $this->tarefa->get_total_tarefa($projeto_id);
	}

	public function get_total_respostas($tarefa_id)
	{
		$this->load->model('mensagem');
		return $this->mensagem->get_total_mensagem($tarefa_id);
	}

}
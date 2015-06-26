<?php

class login {

	private $CI;

	var $table 				= 'usuarios';
	var $table_key 			= 'id';
	var $username_field 	= 'email';
	var $password_field 	= 'senha';

	public function __construct($config = array()) {
		if (count($config) > 0) {
			$this->initialize($config);
		}
		log_message('debug', "Login Class Initialized");
	}

	public function __get($var) {
		return get_instance()->$var;
	}

	public function autentica($options = array()) {
		
		$user = strip_tags($options['user_field']);
		$pass = strip_tags($options['pass_field']);
		
		if (!$user && !$pass) {
			$this->session->set_flashdata('msg', $this->lang->line('proj_msg_login_failed'));
			return redirect('login');
		} else {

			$this->db->where('email', $user);
			$this->db->where('senha', md5($pass));
			$user_data = $this->db->get('usuarios')->row();
			
			if ($user_data->id) {
				$session_data = array(
					'id' => $user_data->id,
					'email' => $user_data->email,
					'admin' => $user_data->admin,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($session_data);
				return true;
			} else {
				$this->session->set_flashdata('msg', $this->lang->line('proj_msg_login_failed'));
				return false;
			}
		}
	}

	public function protect() {
		if ($this->session->userdata('logged_in') == false) {
			$this->session->set_flashdata('msg', $this->lang->line('proj_msg_login_alert'));
			redirect('login');
		}
	}

	public function logout() {
		$session_data = array(
			'id' => null,
			'email' => null,
			'admin' => null,
			'logged_in' => TRUE
		);

		if($this->session->unset_userdata($session_data)){
			return true;
		} else {
			return false;
		}
	}

	public function logged_in()
	{
		return $this->session->userdata('logged_in');
	}

	public function is_admin()
	{
		if($this->session->userdata('admin') == 1){
			return true;
		} else {
			return false;
		}
	}

	public function get_userid()
	{
		return $this->session->userdata('id');
	}

	public function get_nome_by_login()
	{
		$this->db->where('id', $this->get_userid());
		$user_data = $this->db->get('usuarios')->row();
		return $user_data->nome;
	}
}
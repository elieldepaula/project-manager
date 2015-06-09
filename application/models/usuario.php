<?php

class usuario extends MY_Model
{

    public $table_name = 'usuarios';
    public $primary_key = 'id';

    public function get_participantes($projeto_id)
    {

    	return $this->db->query("select usuarios.id, usuarios.nome from usuarios
			inner join participantes
			on usuarios.id = participantes.usuarios_id
			where participantes.projetos_id = " . $projeto_id
		);

    }

}

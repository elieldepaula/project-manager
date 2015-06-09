<?php

class participante extends MY_Model
{

    public $table_name = 'participantes';
    public $primary_key = 'id';

    public function delete_by_projeto($projeto_id)
    {
    	$this->db->where('projetos_id', $projeto_id);
		$this->db->delete($this->table_name); 
    }

}
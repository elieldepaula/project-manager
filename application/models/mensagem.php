<?php

class mensagem extends MY_Model
{

    public $table_name = 'mensagens';
    public $primary_key = 'id';

    public function get_total_mensagem($tarefa_id)
    {
        $this->db->where('tarefa_id', $tarefa_id);
        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }

}

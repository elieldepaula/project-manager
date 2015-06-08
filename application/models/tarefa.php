<?php

class tarefa extends MY_Model
{

    public $table_name = 'tarefas';
    public $primary_key = 'id';

    public function close($id)
    {
        $dados = array('status' => '0');
        if ($this->update($id, $dados)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_by_projeto($projeto_id)
    {
        $this->db->where('projeto_id', $projeto_id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }

    public function get_total_tarefa($projeto_id)
    {
        $this->db->where('projeto_id', $projeto_id);
        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }

}

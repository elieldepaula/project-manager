<?php

class projeto extends MY_Model
{

    public $table_name = 'projetos';
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

}

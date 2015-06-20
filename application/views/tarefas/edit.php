<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_update_task'); ?></strong></h3>
    </div>
    <div class="panel-body">
        <form method="post" name="form1" action="<?= site_url('tarefas/edit/'.$tarefa->id); ?>" role="form">
            <input type="hidden" name="projeto_id" value="<?= $tarefa->projeto_id; ?>">
            <div class="form-group">
                <label><?= $this->lang->line('proj_description'); ?></label>
                <textarea name="descricao" cols="50" rows="5" class="form-control"><?= $tarefa->descricao; ?></textarea>
                <?= form_error('descricao', '<p style="color:#900;">', '</p>'); ?>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_set_task_to'); ?></label>
                        <select name="usuario_id" class="form-control">
                            <?php foreach($usuarios as $row_user) { ?>
                                <option value="<?= $row_user->id; ?>" <?php if($tarefa->usuario_id == $row_user->id){ echo "SELECTED"; } ?> ><?= $row_user->nome; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_begin'); ?></label>
                        <input type="text" name="inicio" value="<?= date_for_user($tarefa->inicio); ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_end'); ?></label>
                        <input type="text" name="fim" value="<?= date_for_user($tarefa->fim); ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_status'); ?></label>
                        <select name="status" class="form-control">
                            <option value="1" <?php if($tarefa->status == '1'){ echo "SELECTED"; } ?>><?= $this->lang->line('proj_open'); ?></option>
                            <option value="0" <?php if($tarefa->status == '0'){ echo "SELECTED"; } ?>><?= $this->lang->line('proj_closed'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="<?= $this->lang->line('proj_save_updates'); ?>" class="btn btn-primary">
                <?= anchor('tarefas/index/'.$tarefa->projeto_id, $this->lang->line('proj_cancel'), array('class'=>'btn btn-danger')); ?>
            </div>
    </div>
    </form>
</div>
</div>
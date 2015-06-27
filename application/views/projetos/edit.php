<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_update_project'); ?></strong></h3>
    </div>
    <div class="panel-body">
        <form method="post" name="form1" action="<?= site_url('projetos/edit/'.$projeto->id); ?>" role="form">
            <div class="form-group">
                <label><?= $this->lang->line('proj_title'); ?></label>
                <input type="text" name="titulo" value="<?php echo $projeto->titulo; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label><?= $this->lang->line('proj_description'); ?></label>
                <textarea name="descricao" id="editor" cols="50" rows="15" class="form-control"><?php echo $projeto->descricao; ?></textarea>
            </div>
            <div class="row">
            <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_leader'); ?></label>
                        <select name="usuario_id" class="form-control">
                        <?php foreach($usuario as $user){ ?>
                            <option value="<?= $user->id; ?>" <?php if($projeto->usuario_id == $user->id){ echo "SELECTED"; } ?>><?= $user->nome; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_begin'); ?></label>
                        <input type="text" name="inincio" value="<?php echo date_for_user($projeto->inincio); ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_end'); ?></label>
                        <input type="text" name="fim" value="<?php echo date_for_user($projeto->fim); ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_status'); ?></label>
                        <select name="status" class="form-control">
                            <option value="1" <?php if($projeto->status == '1'){ echo "SELECTED"; } ?>><?= $this->lang->line('proj_open'); ?></option>
                            <option value="2" <?php if($projeto->status == '2'){ echo "SELECTED"; } ?>><?= $this->lang->line('proj_inprogress'); ?></option>
                            <option value="0" <?php if($projeto->status == '0'){ echo "SELECTED"; } ?>><?= $this->lang->line('proj_closed'); ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="<?= $this->lang->line('proj_save_updates'); ?>" class="btn btn-primary">
                <?= anchor('projetos', $this->lang->line('proj_cancel'), array('class'=>'btn btn-danger')); ?>
            </div>
    </div>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="id" value="<?php echo $projeto->id; ?>">
    </form>
</div>
</div>
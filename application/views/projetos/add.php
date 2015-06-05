<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_new_project'); ?></strong></h3>
    </div>
    <div class="panel-body">
        <form method="post" name="form1" action="<?= site_url('projetos/add'); ?>" role="form">
            <div class="form-group">
                <label><?= $this->lang->line('proj_title'); ?></label>
                <input type="text" name="titulo" value="" size="32" class="form-control">
                <?=  form_error('titulo', '<p style="color:#900;">', '</p>'); ?>
            </div>
            <div class="form-group">
                <label><?= $this->lang->line('proj_description'); ?></label>
                <textarea name="descricao" cols="50" rows="5" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_begin'); ?></label>
                        <input type="text" name="inincio" value="" size="32" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_end'); ?></label>
                        <input type="text" name="fim" value="" size="32" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <label><?= $this->lang->line('proj_status'); ?></label>
                            <select name="status" class="form-control">
                                <option value="1"><?= $this->lang->line('proj_open'); ?></option>
                                <option value="0"><?= $this->lang->line('proj_closed'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="<?= $this->lang->line('proj_save'); ?>" class="btn btn-primary">
                <?= anchor('projetos', $this->lang->line('proj_cancel'), array('class'=>'btn btn-danger')); ?>
            </div>
        </form>
    </div>
</div>
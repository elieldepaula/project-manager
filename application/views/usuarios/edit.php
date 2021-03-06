<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_update_user'); ?></strong></h3>
    </div>
    <div class="panel-body">
        <form method="post" name="form1" action="<?= site_url('usuarios/edit/'.$usuario->id) ?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_name'); ?></label>
                        <input type="text" name="nome" value="<?= $usuario->nome; ?>" class="form-control">
                        <?=  form_error('nome', '<p style="color:#900;">', '</p>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_function'); ?></label>
                        <input type="text" name="funcao" value="<?= $usuario->funcao; ?>" class="form-control">
                        <?=  form_error('funcao', '<p style="color:#900;">', '</p>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_email'); ?></label>
                        <input type="text" name="email" value="<?= $usuario->email; ?>" class="form-control">
                        <?=  form_error('email', '<p style="color:#900;">', '</p>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><?= $this->lang->line('proj_pass'); ?></label>
                        <input type="password" name="senha" value="" class="form-control">
                        <label>
                            <input name="alterar_senha" type="checkbox" id="alterar_senha" value="1" />
                            <?= $this->lang->line('proj_update_pass'); ?>
                        </label>
                        <?=  form_error('senha', '<p style="color:#900;">', '</p>'); ?>                        
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="<?= $this->lang->line('proj_save_updates'); ?>" class="btn btn-primary">
                <?php
                if($this->login->is_admin()){
                    echo anchor('usuarios', $this->lang->line('proj_cancel'), array('class'=>'btn btn-danger'));
                } else {
                    echo anchor('', $this->lang->line('proj_cancel'), array('class'=>'btn btn-danger'));
                }
                ?>
            </div>
            <input type="hidden" name="MM_insert" value="form1">
        </form>
    </div>
</div>
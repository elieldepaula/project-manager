<ol class="breadcrumb">
    <li><?= anchor('', 'Dashboard'); ?></li>
    <li><?= anchor('projetos', $this->lang->line('proj_projects')); ?></li>
    <li><?= anchor('tarefas/index/' . $projeto->id, $projeto->titulo); ?></li>
    <li><?= anchor('tarefas/follow/' . $tarefa->id, $tarefa->descricao); ?></li>
</ol>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_follow_task'); ?></strong></h3>
    </div>
    <div class="panel-body">
    	<div class="row">
    		<div class="col-md-12">
		    	<div class="btn-group btn-group-sm" role="group">
					<?= anchor('tarefas/index/'.$tarefa->projeto_id, '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> '.$this->lang->line('proj_back'), array('class'=>'btn btn-primary')); ?>
					<?= anchor('tarefas/close/'.$tarefa->projeto_id.'/'.$tarefa->id, '<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> '.$this->lang->line('proj_close_task'), array('class'=>'btn btn-danger')); ?>
		    	</div>
		    </div>
    	</div>
        <div class="well well-sm" style="margin-top:15px;">
            <p><?= $tarefa->descricao; ?></p>
            <p><?= $status[$tarefa->status]; ?></p>
        </div>
        <div class="page-header">
        	<h3><?= $this->lang->line('proj_answers'); ?></h3>
        </div>
        <?php 

        if(count($mensagens) == 0)echo '<span class="label label-info">'.$this->lang->line('proj_msg_no_answers').'</span>';

        foreach($mensagens as $row_msg){ 
        	?>
	        <div class="media">
	        	<div class="media-left">
	        		<img class="media-object" src="<?= base_url('assets'); ?>/img/no-user.jpg" width="64" height="64" alt="...">
	        	</div>
	        	<div class="media-body">
	        		<h4 class="media-heading"><?= $this->login->get_nome_by_login(); ?></h4>
	        		<p><?= $row_msg->mensagem; ?></p>
                    <p><span class="label label-info"><?= datetime_for_user($row_msg->data); ?></span></p>
	        		<!-- TODO: opção de excluir caso o logado seja o autor da resposta. -->
	        	</div>
	        </div>
        	<?php 
        } 
        ?>
        <hr/>
        <form action="<?= site_url('tarefas/follow/'.$tarefa->id); ?>" method="post" role="form">
        	<input type="hidden" name="tarefa_id" value="<?= $tarefa->id; ?>" />
        	<div class="form-group">
        		<label for="mensagem"><?= $this->lang->line('proj_new_answer'); ?></label>
        		<textarea name="mensagem" id="mensagem" class="form-control" placeholder="<?= $this->lang->line('proj_message'); ?>"></textarea>
        		<?= form_error('mensagem', '<p style="color:#900;">', '</p>'); ?>
        	</div>
        	<div class="form-group">
        		<button type="submit" class="btn btn-primary"><?= $this->lang->line('proj_send_answer'); ?></button>
        	</div>
        </form>
    </div>
</div>
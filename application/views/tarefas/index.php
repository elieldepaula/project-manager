<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_tasksof'); ?> <?= $projeto->titulo; ?></strong></h3>
    </div>
    <div class="panel-body">
        <p class="well"><?php echo $projeto->descricao; ?></p>
        <p>
            <?= anchor('tarefas/add/' . $projeto_id, $this->lang->line('proj_new_task'), array('class'=>'btn btn-primary')); ?>
        </p>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th><strong><?= $this->lang->line('proj_id'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_description'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_begin'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_end'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_status'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_actions'); ?></strong></th>
                </tr>
            </thead>
            <?php foreach($query as $row) { ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo word_limiter(ascii_to_entities($row->descricao), 12); ?></td>
                    <td><?php echo mdate('%d/%m/%Y', strtotime($row->inicio)); ?></td>
                    <td><?php echo mdate('%d/%m/%Y', strtotime($row->fim)); ?></td>
                    <td><?php echo $status[$row->status]; ?></td>
                    <td>
                        <div class="btn-group">
                            <?= anchor('tarefas/close/'.$row->projeto_id.'/'.$row->id, '<i class="glyphicon glyphicon-ok"></i>', array('class'=>'btn btn-primary')); ?>
                            <?= anchor('tarefas/edit/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>', array('class'=>'btn btn-primary')); ?>
                            <?= anchor('tarefas/del/'.$row->projeto_id.'/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('class'=>'btn btn-primary', 'onclick'=>'return apagar();')); ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
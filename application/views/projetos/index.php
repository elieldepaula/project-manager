<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_projects'); ?></strong></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group btn-group-sm" role="group">
                    <?= anchor('projetos/add', '<i class="glyphicon glyphicon-plus"></i> '.$this->lang->line('proj_new_project'), array('class'=>'btn btn-primary')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th><strong><?= $this->lang->line('proj_id'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_title'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_begin'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_end'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_status'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_actions'); ?></strong></th>
                </tr>
            </thead>
            <?php foreach($query as $row) { ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?= anchor('tarefas/index/'.$row->id, $row->titulo) . ' <span class="badge">' . $this->utils->get_total_tasks($row->id) . '</span>'; ?></td>
                    <td><?php echo mdate('%d/%m/%Y', strtotime($row->inincio)); ?></td>
                    <td><?php echo mdate('%d/%m/%Y', strtotime($row->fim)); ?></td>
                    <td><?php echo $status[$row->status]; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <?= anchor('projetos/edit/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>', array('class'=>'btn btn-primary')); ?>
                            <?= anchor('projetos/del/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('class'=>'btn btn-primary', 'onclick'=>'return apagar();')); ?>
                        </div>
                    </td>
                </tr>
            <?php }  ?>
        </table>
    </div>
</div>
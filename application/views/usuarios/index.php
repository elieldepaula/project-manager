<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_users'); ?></strong></h3>
    </div>
    <div class="panel-body">
        <p><?= anchor('usuarios/add', $this->lang->line('proj_new_user'), array('class' => 'btn btn-primary')); ?></p>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th><strong><?= $this->lang->line('proj_id'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_name'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_function'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_email'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_actions'); ?></strong></th>
                </tr>
            </thead>
            <?php
            foreach($query as $row){ ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->nome; ?></td>
                    <td><?php echo $row->funcao; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <?= anchor('usuarios/edit/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>', array('class'=>'btn btn-primary')) ; ?>
                            <?= anchor('usuarios/del/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('class'=>'btn btn-primary', 'onclick'=>'return apagar();')) ; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
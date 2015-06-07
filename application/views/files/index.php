<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>Arquivos</strong></h3>
    </div>
    <div class="panel-body">
        <p><?= anchor('usuarios/add', 'Adicionar arquivo', array('class' => 'btn btn-primary')); ?></p>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th><strong>Id</strong></th>
                    <th><strong>Descrição</strong></th>
                    <th><strong>Data</strong></th>
                    <th><strong><?= $this->lang->line('proj_actions'); ?></strong></th>
                </tr>
            </thead>
            <?php
            foreach($query as $row){ ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->descricao; ?></td>
                    <td><?php echo mdate('%d/%m/%Y', strtotime($row->data)); ?></td>
                    <td>
                        <div class="btn-group">
                            <?= anchor('files/edit/'.$projeto_id.'/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>', array('class'=>'btn btn-primary')) ; ?>
                            <?= anchor('files/del/'.$projeto_id.'/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('class'=>'btn btn-primary', 'onclick'=>'return apagar();')) ; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
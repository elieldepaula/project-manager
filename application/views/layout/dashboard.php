<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?= $this->lang->line('proj_yourtasks'); ?></strong></h3>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th><strong><?= $this->lang->line('proj_id'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_description'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_project'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_end'); ?></strong></th>
                    <th><strong><?= $this->lang->line('proj_status'); ?></strong></th>
                    <!-- <th><strong><?= $this->lang->line('proj_actions'); ?></strong></th> -->
                </tr>
            </thead>
            <?php foreach($query as $row) { ?>
                <tr>
                    <td>#<?php echo $row->id; ?></td>
                    <td><?php echo anchor('tarefas/follow/'.$row->id, word_limiter(ascii_to_entities($row->descricao), 12)) . ' <span class="badge">' . $this->utils->get_total_respostas($row->id) . '</span>'; ?></td>
                    <td><?php echo $row->projeto; ?></td>
                    <td><?php echo mdate('%d/%m/%Y', strtotime($row->fim)); ?></td>
                    <td><?php echo $status[$row->status]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
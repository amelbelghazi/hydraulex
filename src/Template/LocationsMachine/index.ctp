<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Locations Machine
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Locations Machine</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('machine_id') ?></th>
                <th><?= $this->Paginator->sort('cout') ?></th>
                <th><?= $this->Paginator->sort('locataire_id') ?></th>
                <th><?= $this->Paginator->sort('datelocation') ?></th>
                <th><?= $this->Paginator->sort('duree') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($locationsMachine as $locationsMachine): ?>
              <tr>
                <td><?= $this->Number->format($locationsMachine->id) ?></td>
                <td><?= $locationsMachine->has('machine') ? $this->Html->link($locationsMachine->machine->id, ['controller' => 'Machines', 'action' => 'view', $locationsMachine->machine->id]) : '' ?></td>
                <td><?= $this->Number->format($locationsMachine->cout) ?></td>
                <td><?= $locationsMachine->has('locataire') ? $this->Html->link($locationsMachine->locataire->id, ['controller' => 'Locataires', 'action' => 'view', $locationsMachine->locataire->id]) : '' ?></td>
                <td><?= h($locationsMachine->datelocation) ?></td>
                <td><?= $this->Number->format($locationsMachine->duree) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $locationsMachine->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $locationsMachine->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $locationsMachine->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo $this->Paginator->numbers(); ?>
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->

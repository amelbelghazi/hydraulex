<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Reparations
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Reparations</h3>
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
                <th><?= $this->Paginator->sort('panne_id') ?></th>
                <th><?= $this->Paginator->sort('garage_id') ?></th>
                <th><?= $this->Paginator->sort('datereparation') ?></th>
                <th><?= $this->Paginator->sort('cout') ?></th>
                <th><?= $this->Paginator->sort('duree') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($reparations as $reparation): ?>
              <tr>
                <td><?= $this->Number->format($reparation->id) ?></td>
                <td><?= $reparation->has('panne') ? $this->Html->link($reparation->panne->id, ['controller' => 'Pannes', 'action' => 'view', $reparation->panne->id]) : '' ?></td>
                <td><?= $reparation->has('garage') ? $this->Html->link($reparation->garage->id, ['controller' => 'Garages', 'action' => 'view', $reparation->garage->id]) : '' ?></td>
                <td><?= h($reparation->datereparation) ?></td>
                <td><?= $this->Number->format($reparation->cout) ?></td>
                <td><?= $this->Number->format($reparation->duree) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $reparation->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reparation->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reparation->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

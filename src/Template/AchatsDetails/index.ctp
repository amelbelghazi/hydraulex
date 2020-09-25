<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Achats Details
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Achats Details</h3>
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
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('achat_id') ?></th>
                <th><?= $this->Paginator->sort('datedebutservice') ?></th>
                <th><?= $this->Paginator->sort('datedebutcirculation') ?></th>
                <th><?= $this->Paginator->sort('stock_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($achatsDetails as $achatsDetail): ?>
              <tr>
                <td><?= $this->Number->format($achatsDetail->id) ?></td>
                <td><?= h($achatsDetail->nom) ?></td>
                <td><?= h($achatsDetail->code) ?></td>
                <td><?= $achatsDetail->has('achat') ? $this->Html->link($achatsDetail->achat->id, ['controller' => 'Achats', 'action' => 'view', $achatsDetail->achat->id]) : '' ?></td>
                <td><?= h($achatsDetail->datedebutservice) ?></td>
                <td><?= h($achatsDetail->datedebutcirculation) ?></td>
                <td><?= $achatsDetail->has('stock') ? $this->Html->link($achatsDetail->stock->id, ['controller' => 'Stocks', 'action' => 'view', $achatsDetail->stock->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $achatsDetail->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $achatsDetail->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $achatsDetail->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

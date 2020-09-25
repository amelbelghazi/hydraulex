<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Details Marches
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Details Marches</h3>
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
                <th><?= $this->Paginator->sort('datedetails') ?></th>
                <th><?= $this->Paginator->sort('marche_id') ?></th>
                <th><?= $this->Paginator->sort('avenant_id') ?></th>
                <th><?= $this->Paginator->sort('intitule') ?></th>
                <th><?= $this->Paginator->sort('montant') ?></th>
                <th><?= $this->Paginator->sort('delai') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($detailsMarches as $detailsmarche): ?>
              <tr>
                <td><?= $this->Number->format($detailsmarche->id) ?></td>
                <td><?= h($detailsmarche->datedetails) ?></td>
                <td><?= $detailsmarche->has('marche') ? $this->Html->link($detailsmarche->marche->id, ['controller' => 'Marches', 'action' => 'view', $detailsmarche->marche->id]) : '' ?></td>
                <td><?= $detailsmarche->has('avenant') ? $this->Html->link($detailsmarche->avenant->id, ['controller' => 'Avenants', 'action' => 'view', $detailsmarche->avenant->id]) : '' ?></td>
                <td><?= h($detailsmarche->intitule) ?></td>
                <td><?= $this->Number->format($detailsmarche->montant) ?></td>
                <td><?= h($detailsmarche->delai) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $detailsmarche->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailsmarche->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detailsmarche->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Stocks Locations
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Stocks Locations</h3>
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
                <th><?= $this->Paginator->sort('datestock') ?></th>
                <th><?= $this->Paginator->sort('qte') ?></th>
                <th><?= $this->Paginator->sort('prix') ?></th>
                <th><?= $this->Paginator->sort('depot_id') ?></th>
                <th><?= $this->Paginator->sort('locations_detail_id') ?></th>
                <th><?= $this->Paginator->sort('produit_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($stocksLocations as $stocksLocation): ?>
              <tr>
                <td><?= $this->Number->format($stocksLocation->id) ?></td>
                <td><?= h($stocksLocation->datestock) ?></td>
                <td><?= $this->Number->format($stocksLocation->qte) ?></td>
                <td><?= $this->Number->format($stocksLocation->prix) ?></td>
                <td><?= $stocksLocation->has('depot') ? $this->Html->link($stocksLocation->depot->libelle, ['controller' => 'Depots', 'action' => 'view', $stocksLocation->depot->id]) : '' ?></td>
                <td><?= $this->Number->format($stocksLocation->locations_detail_id) ?></td>
                <td><?= $stocksLocation->has('produit') ? $this->Html->link($stocksLocation->produit->nom, ['controller' => 'Produits', 'action' => 'view', $stocksLocation->produit->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $stocksLocation->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stocksLocation->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stocksLocation->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

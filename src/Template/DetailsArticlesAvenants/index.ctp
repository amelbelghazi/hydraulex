<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Details Articles Avenants
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Details Articles Avenants</h3>
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
                <th><?= $this->Paginator->sort('articles_avenant_id') ?></th>
                <th><?= $this->Paginator->sort('qte') ?></th>
                <th><?= $this->Paginator->sort('unite_id') ?></th>
                <th><?= $this->Paginator->sort('prix') ?></th>
                <th><?= $this->Paginator->sort('datedetailsavenant') ?></th>
                <th><?= $this->Paginator->sort('soustraitant_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($detailsArticlesAvenants as $detailsArticlesAvenant): ?>
              <tr>
                <td><?= $this->Number->format($detailsArticlesAvenant->id) ?></td>
                <td><?= $detailsArticlesAvenant->has('articles_avenant') ? $this->Html->link($detailsArticlesAvenant->articles_avenant->id, ['controller' => 'ArticlesAvenants', 'action' => 'view', $detailsArticlesAvenant->articles_avenant->id]) : '' ?></td>
                <td><?= $this->Number->format($detailsArticlesAvenant->qte) ?></td>
                <td><?= $detailsArticlesAvenant->has('unite') ? $this->Html->link($detailsArticlesAvenant->unite->signe, ['controller' => 'Unites', 'action' => 'view', $detailsArticlesAvenant->unite->id]) : '' ?></td>
                <td><?= $this->Number->format($detailsArticlesAvenant->prix) ?></td>
                <td><?= h($detailsArticlesAvenant->datedetailsavenant) ?></td>
                <td><?= $detailsArticlesAvenant->has('soustraitant') ? $this->Html->link($detailsArticlesAvenant->soustraitant->id, ['controller' => 'Soustraitants', 'action' => 'view', $detailsArticlesAvenant->soustraitant->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $detailsArticlesAvenant->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailsArticlesAvenant->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detailsArticlesAvenant->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

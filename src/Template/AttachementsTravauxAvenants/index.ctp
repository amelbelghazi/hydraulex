<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Attachements Travaux Avenants
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Attachements Travaux Avenants</h3>
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
                <th><?= $this->Paginator->sort('details_articles_avenant_id') ?></th>
                <th><?= $this->Paginator->sort('qte') ?></th>
                <th><?= $this->Paginator->sort('dateattachementavenant') ?></th>
                <th><?= $this->Paginator->sort('modified_by') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($attachementsTravauxAvenants as $attachementsTravauxAvenant): ?>
              <tr>
                <td><?= $this->Number->format($attachementsTravauxAvenant->id) ?></td>
                <td><?= $attachementsTravauxAvenant->has('details_articles_avenant') ? $this->Html->link($attachementsTravauxAvenant->details_articles_avenant->id, ['controller' => 'DetailsArticlesAvenants', 'action' => 'view', $attachementsTravauxAvenant->details_articles_avenant->id]) : '' ?></td>
                <td><?= $this->Number->format($attachementsTravauxAvenant->qte) ?></td>
                <td><?= h($attachementsTravauxAvenant->dateattachementavenant) ?></td>
                <td><?= $this->Number->format($attachementsTravauxAvenant->modified_by) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $attachementsTravauxAvenant->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attachementsTravauxAvenant->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attachementsTravauxAvenant->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

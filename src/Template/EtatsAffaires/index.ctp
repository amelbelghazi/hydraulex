<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Etats Affaires
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Etats Affaires</h3>
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
                <th><?= $this->Paginator->sort('affaire_id') ?></th>
                <th><?= $this->Paginator->sort('etat_id') ?></th>
                <th><?= $this->Paginator->sort('cause') ?></th>
                <th><?= $this->Paginator->sort('modified_by') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($etatsAffaires as $etatsAffaire): ?>
              <tr>
                <td><?= $this->Number->format($etatsAffaire->id) ?></td>
                <td><?= $etatsAffaire->has('affaire') ? $this->Html->link($etatsAffaire->affaire->intitule, ['controller' => 'Affaires', 'action' => 'view', $etatsAffaire->affaire->id]) : '' ?></td>
                <td><?= $etatsAffaire->has('etat') ? $this->Html->link($etatsAffaire->etat->id, ['controller' => 'Etats', 'action' => 'view', $etatsAffaire->etat->id]) : '' ?></td>
                <td><?= h($etatsAffaire->cause) ?></td>
                <td><?= $this->Number->format($etatsAffaire->modified_by) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $etatsAffaire->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $etatsAffaire->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $etatsAffaire->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

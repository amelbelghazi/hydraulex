<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Positions Administratives
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Positions Administratives</h3>
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
                <th><?= $this->Paginator->sort('personnel_id') ?></th>
                <th><?= $this->Paginator->sort('fonction_id') ?></th>
                <th><?= $this->Paginator->sort('departement_id') ?></th>
                <th><?= $this->Paginator->sort('modified_by') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($positionsAdministratives as $positionsAdministrative): ?>
              <tr>
                <td><?= $this->Number->format($positionsAdministrative->id) ?></td>
                <td><?= $positionsAdministrative->has('personnel') ? $this->Html->link($positionsAdministrative->personnel->id, ['controller' => 'Personnels', 'action' => 'view', $positionsAdministrative->personnel->id]) : '' ?></td>
                <td><?= $positionsAdministrative->has('fonction') ? $this->Html->link($positionsAdministrative->fonction->id, ['controller' => 'Fonctions', 'action' => 'view', $positionsAdministrative->fonction->id]) : '' ?></td>
                <td><?= $positionsAdministrative->has('departement') ? $this->Html->link($positionsAdministrative->departement->nom, ['controller' => 'Departements', 'action' => 'view', $positionsAdministrative->departement->id]) : '' ?></td>
                <td><?= $this->Number->format($positionsAdministrative->modified_by) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $positionsAdministrative->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $positionsAdministrative->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $positionsAdministrative->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

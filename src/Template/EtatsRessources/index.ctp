<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Etats Ressources
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Etats Ressources</h3>
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
                <th><?= $this->Paginator->sort('cause') ?></th>
                <th><?= $this->Paginator->sort('ressource_id') ?></th>
                <th><?= $this->Paginator->sort('types_etats_ressource_id') ?></th>
                <th><?= $this->Paginator->sort('dateetat') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($etatsRessources as $etatsRessource): ?>
              <tr>
                <td><?= $this->Number->format($etatsRessource->id) ?></td>
                <td><?= h($etatsRessource->cause) ?></td>
                <td><?= $etatsRessource->has('ressource') ? $this->Html->link($etatsRessource->ressource->id, ['controller' => 'Ressources', 'action' => 'view', $etatsRessource->ressource->id]) : '' ?></td>
                <td><?= $this->Number->format($etatsRessource->types_etats_ressource_id) ?></td>
                <td><?= h($etatsRessource->dateetat) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $etatsRessource->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $etatsRessource->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $etatsRessource->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

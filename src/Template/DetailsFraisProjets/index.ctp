<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Details Frais Projets
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Details Frais Projets</h3>
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
                <th><?= $this->Paginator->sort('types_frais_id') ?></th>
                <th><?= $this->Paginator->sort('montant') ?></th>
                <th><?= $this->Paginator->sort('datefrais') ?></th>
                <th><?= $this->Paginator->sort('frais_projet_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($detailsFraisProjets as $detailsFraisProjet): ?>
              <tr>
                <td><?= $this->Number->format($detailsFraisProjet->id) ?></td>
                <td><?= $detailsFraisProjet->has('types_frai') ? $this->Html->link($detailsFraisProjet->types_frai->libelle, ['controller' => 'TypesFrais', 'action' => 'view', $detailsFraisProjet->types_frai->id]) : '' ?></td>
                <td><?= $this->Number->format($detailsFraisProjet->montant) ?></td>
                <td><?= h($detailsFraisProjet->datefrais) ?></td>
                <td><?= $detailsFraisProjet->has('frais_projet') ? $this->Html->link($detailsFraisProjet->frais_projet->id, ['controller' => 'FraisProjets', 'action' => 'view', $detailsFraisProjet->frais_projet->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $detailsFraisProjet->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailsFraisProjet->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detailsFraisProjet->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

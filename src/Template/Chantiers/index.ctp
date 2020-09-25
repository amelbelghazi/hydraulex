<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Chantiers
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste des') ?> chantiers</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Rechercher') ?>">
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
                <th><?= $this->Paginator->sort('marche_id', ['label'=>'Marché']) ?></th>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('adresse') ?></th>
                <th><?= $this->Paginator->sort('wilaya_id') ?></th>
                <th><?= $this->Paginator->sort('etats_chantier_id', ['label'=>'Etat']) ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($chantiers as $chantier): ?>
              <tr>
                <td><?= $this->Number->format($chantier->id) ?></td>
                <td><?= $chantier->has('marche') ? $this->Html->link(end($chantier->marche->details_marches)->intitule, ['controller' => 'Marches', 'action' => 'view', $chantier->marche->id]) : '' ?></td>
                <td><?= h($chantier->nom) ?></td>
                <td><?= h($chantier->adresse) ?></td>
                <td><?= $chantier->has('wilaya') ? $this->Html->link($chantier->wilaya->nom, ['controller' => 'Wilayas', 'action' => 'view', $chantier->wilaya->id]) : '' ?></td>
                <td><?= $chantier->has('etats_chantiers') ? $this->Html->link(end($chantier->etats_chantiers)->types_etats_chantier->libelle, ['controller' => 'EtatsChantiers', 'action' => 'view', end($chantier->etats_chantiers)->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $chantier->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $chantier->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $chantier->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Contrats Personnels
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste des') ?> contrats</h3>
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
                <th><?= $this->Paginator->sort('personnel_id') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('dateetablissement', ['label'=>'Date']) ?></th>
                <th><?= $this->Paginator->sort('duree', ['label'=>'Durée']) ?></th>
                <th><?= $this->Paginator->sort('types_etats_contrat_id', ['label'=>'Etat']) ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($contratsPersonnels as $contratsPersonnel): ?>
              <tr>
                <td><?= $this->Number->format($contratsPersonnel->id) ?></td>
                <td><?= $contratsPersonnel->has('personnel') && $contratsPersonnel->personnel->has('personne')? $this->Html->link($contratsPersonnel->personnel->personne->nom.' '.$contratsPersonnel->personnel->personne->prenom, ['controller' => 'Personnels', 'action' => 'view', $contratsPersonnel->personnel->id]) : '' ?></td>
                <td><?= $contratsPersonnel->has('contrat') ? $contratsPersonnel->contrat->type == 0 ? 'CDI' : 'CDD' :'' ?></td>
                <td><?= $contratsPersonnel->has('contrat') ? $contratsPersonnel->contrat->dateetablissement :'' ?></td>
                <td><?= $contratsPersonnel->has('contrat') ? isset($contratsPersonnel->contrat->duree)? $contratsPersonnel->contrat->duree: '/' : '' ?></td>
                <td><?= $contratsPersonnel->has('contrat') && $contratsPersonnel->contrat->has('etats_contrats') && end($contratsPersonnel->contrat->etats_contrats)->has('types_etats_contrat')? end($contratsPersonnel->contrat->etats_contrats)->types_etats_contrat->libelle: '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $contratsPersonnel->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $contratsPersonnel->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $contratsPersonnel->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

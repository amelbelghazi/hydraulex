<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Affectations
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste des') ?> affectations</h3>
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
                <th><?= $this->Paginator->sort('ressource_id') ?></th>
                <th><?= $this->Paginator->sort('dateaffectation') ?></th>
                <th><?= $this->Paginator->sort('Chantier/Departement') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($affectations as $affectation): ?>
              <tr>
                <td><?= $this->Number->format($affectation->id) ?></td>
                <td><?= $affectation->has('ressource') ? $this->Html->link($affectation->ressource->nom, ['controller' => 'Ressources', 'action' => 'view', $affectation->ressource->id]) : '' ?></td>
                <td><?= h($affectation->dateaffectation) ?></td>
                <td>
                  <?= !empty($affectation->affectations_chantier) ? $this->Html->link(end($affectation->affectations_chantier)->chantier->nom, ['controller' => 'Chantiers', 'action' => 'view', end($affectation->affectations_chantier)->chantier->id]) : $this->Html->link(end($affectation->affectations_administration)->departement->nom, ['controller' => 'Departements', 'action' => 'view', end($affectation->affectations_administration)->departement->id]) ?>
                </td>
                <td>
                  <?= !empty($affectation->affectations_chantier) ? h("Chantier") : h('Administration')?>
                </td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $affectation->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $affectation->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $affectation->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

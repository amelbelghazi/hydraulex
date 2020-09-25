<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Entretiens Ressources
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste des') ?> entretiens de ressources</h3>
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
                <th><?= $this->Paginator->sort('libelle') //entretiens.libelle ?></th> 
                <th><?= $this->Paginator->sort('cout') //entretiens.cout?></th>
                <th><?= $this->Paginator->sort('periode') //entretiens.periode?></th>
                <th><?= $this->Paginator->sort('duree') //entretiens.duree?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($entretiensRessources as $entretiensRessource): ?>
              <tr>
                <td><?= $this->Number->format($entretiensRessource->id) ?></td>
                <td><?= $entretiensRessource->has('ressource') ? $this->Html->link($entretiensRessource->ressource->nom, ['controller' => 'Ressources', 'action' => 'view', $entretiensRessource->ressource->id]) : '' ?></td>
                <td><?= $entretiensRessource->has('entretien') ? $this->Html->link($entretiensRessource->entretien->libelle, ['controller' => 'Entretiens', 'action' => 'view', $entretiensRessource->entretien->id]) : '' ?></td>
                <td><?= $entretiensRessource->has('entretien') ? $this->Html->link($entretiensRessource->entretien->cout, ['controller' => 'Entretiens', 'action' => 'view', $entretiensRessource->entretien->id]) : '' ?></td>
                <td><?= $entretiensRessource->has('entretien') ? $this->Html->link($entretiensRessource->entretien->periode->libelle, ['controller' => 'Entretiens', 'action' => 'view', $entretiensRessource->entretien->id]) : '' ?></td>
                <td><?= $entretiensRessource->has('entretien') ? $this->Html->link($entretiensRessource->entretien->duree, ['controller' => 'Entretiens', 'action' => 'view', $entretiensRessource->entretien->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $entretiensRessource->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $entretiensRessource->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $entretiensRessource->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

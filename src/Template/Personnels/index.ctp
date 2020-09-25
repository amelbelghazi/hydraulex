<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Personnels
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste du ') ?> personnels</h3>
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
                <th><?= $this->Paginator->sort('personne_id', ['label'=>'Nom complet']) ?></th>
                <th><?= $this->Paginator->sort('fonction', ['label'=>'Fonction']) ?></th>
                <th><?= $this->Paginator->sort('types_personnel', ['label'=>'Type']) ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($personnels as $personnel): ?>
              <tr>
                <td><?= $this->Number->format($personnel->id) ?></td>
                <td><?= $personnel->has('personne') ? $this->Html->link($personnel->personne->nom.' '.$personnel->personne->prenom, ['controller' => 'Personnes', 'action' => 'view', $personnel->personne->id]) : '' ?></td>
                <td><?= $personnel->has('positions') ? !empty(end($personnel->positions)->positions_chantiers)? $this->Html->link(end(end($personnel->positions)->positions_chantiers)->fonction->nom, ['controller' => 'Positions', 'action' => 'view', end($personnel->positions)->id]) : $this->Html->link(end(end($personnel->positions)->positions_administratives)->fonction->nom, ['controller' => 'Positions', 'action' => 'view', end($personnel->positions)->id]) : ''?></td>
                <td><?= $personnel->has('positions') ? !empty(end($personnel->positions)->positions_chantiers)? h('Chantier') : h('Administration') : ''?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $personnel->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $personnel->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $personnel->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

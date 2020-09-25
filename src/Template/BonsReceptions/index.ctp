<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Bons  de reception
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste des') ?> bons de reception</h3>
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
                <th><?= $this->Paginator->sort('bons_commande_id', ['label'=> 'Bon de commande N°']) ?></th>
                <th><?= $this->Paginator->sort('achat_id' , ['label'=> 'Achat N°']) ?></th>
                <th><?= $this->Paginator->sort('datereception', ['label'=> 'Date de reception']) ?></th>
                <th><?= $this->Paginator->sort('observation') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($bonsReceptions as $bonsReception): ?>
              <tr>
                <td><?= $this->Number->format($bonsReception->id) ?></td>
                <td><?= $bonsReception->has('bons_commande') ? $this->Html->link($bonsReception->bons_commande->numero, ['controller' => 'BonsCommandes', 'action' => 'view', $bonsReception->bons_commande->numero]) : '' ?></td>
                <td><?= $bonsReception->has('achats') ? $this->Html->link(end($bonsReception->achats)->numero, ['controller' => 'Achats', 'action' => 'view', end($bonsReception->achats)->id]) : '' ?></td>
                <td><?= h($bonsReception->datereception) ?></td>
                <td><?= h($bonsReception->observation) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $bonsReception->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $bonsReception->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

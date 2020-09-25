<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Bons Commandes
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-6""><?= __('Liste des') ?> bons commandes</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('departement_id'=>'departement', 'fournisseur_id'=>'fournisseur','datebon'=>'Date' )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
                <?php echo $this->Form->input('search', array('label'=>false,'class'=>'form-control col-md-2','placeholder'=>'Remplissez pour lancer la recherche','type'=>'text','style'=>'    width: auto;' )); ?>
              <div class="input-group" >
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Recherche') ?></button>
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
                <th><?= $this->Paginator->sort('departement_id') ?></th>
                <th><?= $this->Paginator->sort('fournisseur_id') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('tva', ['label'=>'TVA']) ?></th>
                <th><?= $this->Paginator->sort('datebon') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($bonsCommandes as $bonsCommande): ?>
              <tr>
                <td><?= $this->Number->format($bonsCommande->id) ?></td>
                <td><?= $bonsCommande->has('departement') ? $this->Html->link($bonsCommande->departement->nom, ['controller' => 'Departements', 'action' => 'view', $bonsCommande->departement->id]) : '' ?></td>
                <td><?= $bonsCommande->has('fournisseur') ? $this->Html->link($bonsCommande->fournisseur->nom, ['controller' => 'Fournisseurs', 'action' => 'view', $bonsCommande->fournisseur->id]) : '' ?></td>
                <td><?= $this->Number->format($bonsCommande->total) ?></td>
                <td><?= $this->Number->format($bonsCommande->tva) ?></td>
                <td><?= h($bonsCommande->datebon) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $bonsCommande->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $bonsCommande->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $bonsCommande->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

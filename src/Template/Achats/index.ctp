<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Achats
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box"> 
        <div class="box-header">
          <h3 class="box-title col-md-6""><?= __('Liste des') ?> achats</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('departement_id'=>'departement', 'fournisseur_id'=>'fournisseur' , 'datebon'=>'Date' , 'regle'=>'Réglée')),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('datebon') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('tva', ['label'=>'TVA']) ?></th>
                <th><?= $this->Paginator->sort('regle', ['label'=>'Réglée']) ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($achats as $achat): ?>
              <tr>
                <td><?= $this->Number->format($achat->id) ?></td>
                <td><?= $achat->has('departement') ? $this->Html->link($achat->departement->nom, ['controller' => 'Departements', 'action' => 'view', $achat->departement->id]) : '' ?></td>
                <td><?= $achat->has('fournisseur') ? $this->Html->link($achat->fournisseur->nom, ['controller' => 'Fournisseurs', 'action' => 'view', $achat->fournisseur->id]) : '' ?></td>
                <td><?= h($achat->datebon) ?></td>
                <td><?= $this->Number->format($achat->total) ?></td>
                <td><?= $this->Number->format($achat->tva) ?></td>
                <td><?= h($achat->regle) == 0 ? 'Oui' : 'Non' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $achat->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $achat->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $achat->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Marchés
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-6""><?= __('Liste des') ?> Marchés</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('affaire_id'=>'Intiutlé', 'numero'=>'numero','maitres_oeuvre_id'=>'maitres oeuvre' )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('affaire_id', ['libelle'=>'Intiutlé']) ?></th>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('maitres_oeuvre_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($marches as $marche): ?>
              <tr>
                <td><?= $this->Number->format($marche->id) ?></td>
                <td><?= $marche->has('affaire') ? $this->Html->link($marche->affaire->intitule, ['controller' => 'Affaires', 'action' => 'view', $marche->affaire->id]) : '' ?></td>
                <td><?= $this->Number->format($marche->numero) ?></td>
                <td><?= $marche->has('maitres_oeuvre') ? $this->Html->link($marche->maitres_oeuvre->nom, ['controller' => 'MaitresOeuvres', 'action' => 'view', $marche->maitres_oeuvre->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $marche->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $marche->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $marche->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

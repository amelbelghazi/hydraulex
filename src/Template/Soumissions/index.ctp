<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Soumissions
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="box  box-info">
        <div class="box-header">
          <h3 class="box-title col-md-8" style="    padding: 26px;"><?= __('Liste des ') ?> soumissions</h3>

          <div class="box-tools col-md-4 "  style="position: initial;">
         
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('affaire_id'=>'affaire', 'soumissionnaire_id'=>'soumissionnaire' )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('affaire_id') ?></th>
                <th><?= $this->Paginator->sort('soumissionnaire_id') ?></th>
                <th><?= $this->Paginator->sort('montant') ?></th>
                <th><?= $this->Paginator->sort('delais') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($soumissions as $soumission): ?>
              <tr>
                <td><?= $this->Number->format($soumission->id) ?></td>
                <td><?= $soumission->has('affaire') ? $this->Html->link($soumission->affaire->intitule, ['controller' => 'Affaires', 'action' => 'view', $soumission->affaire->id]) : '' ?></td>
                <td><?= $soumission->has('soumissionnaire') ? $this->Html->link($soumission->soumissionnaire->nom, ['controller' => 'Soumissionnaires', 'action' => 'view', $soumission->soumissionnaire->id]) : '' ?></td>
                <td class="font-montant"> <?= h(number_format($soumission->montant, 2, '.', ' ').' DA') ?></td>
                <td class="font-delai"><?= h($soumission->delais).' mois' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $soumission->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $soumission->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $soumission->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

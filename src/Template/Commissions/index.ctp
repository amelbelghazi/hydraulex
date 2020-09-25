<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Commissions
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="box  box-info">
        <div class="box-header">
          
          <h3 class="box-title col-md-8" style="    padding: 26px;"><?= __('Liste des ') ?> commissions</h3>

          <div class="box-tools col-md-4 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('affaire_id'=>'affaire', 'datecommission'=>'date' )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('affaire_id' , ['label'=>'Appels d\'offre']) ?></th>
                <th><?= $this->Paginator->sort('Documents') ?></th>
                <th><?= $this->Paginator->sort('datecommission', ['label'=>'Date commission']) ?></th>
                <th><?= __('Opérations') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php  foreach ($commissions as $commission): ?>
              <tr>
                <td><?= $this->Number->format($commission->id) ?></td>
                <td><?= $commission->has('affaire') ? $this->Html->link($commission->affaire->intitule, ['controller' => 'Affaires', 'action' => 'view', $commission->affaire->id]) : '' ?></td>
                 <td><?= $commission->has('document') ? $this->Html->link('Télécharger','/files/Commissions/' . $commission->document->document) : 'Aucun fichier' ?></td>
                <td class="font-date"><?= h($commission->datecommission) ?></td>
                <td class="actions" style="white-space:nowrap">
                  <!--<?= $this->Html->link(__('View'), ['action' => 'view', $commission->id], ['class'=>'btn btn-info btn-xs']) ?>-->
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $commission->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $commission->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

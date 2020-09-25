<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Courriers Arrivée
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-7 "><?= __('Listes Des') ?> Courriers Arrivée</h3>
          <div class="box-tools col-md-5 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array( 'objet'=>'Objet', 'observation'=>'Observation', 'dateenvoi'=>'date d\'envoi', 'expediteur'=>'Expediteur')),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
                <?php echo $this->Form->input('search', array('label'=>false,'class'=>'form-control col-md-2','placeholder'=>'Fill in to start search','type'=>'text','style'=>'    width: auto;' )); ?>
              <div class="input-group" >
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
                <th><?= $this->Paginator->sort('objet') ?></th>
                <th><?= $this->Paginator->sort('observation') ?></th>
                <th><?= $this->Paginator->sort('date d\'envoi') ?></th>
                <th><?= $this->Paginator->sort('expediteur_id') ?></th>
               
                <th><?= $this->Paginator->sort('telecharger_documents') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($correspondancesEntrantes as $correspondancesEntrante): ?>
              <tr>
                <td><?= $this->Number->format($correspondancesEntrante->id) ?></td>
                <td><?= h($correspondancesEntrante->objet) ?></td>
                 <td><?= h($correspondancesEntrante->observation) ?></td>
                  <td><?= h($correspondancesEntrante->dateenvoi) ?></td>
                <td><?= $correspondancesEntrante->has('expediteur') ? $this->Html->link($correspondancesEntrante->expediteur->nom, ['controller' => 'Expediteurs', 'action' => 'view', $correspondancesEntrante->expediteur->id]) : '' ?></td>
                
                <td> <?php echo $this->Html->link('Download File','/img/Correspondances/Entrantes/' . $correspondancesEntrante->fichier); ?>
               </td>
               
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $correspondancesEntrante->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $correspondancesEntrante->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $correspondancesEntrante->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Courriers Sortantes
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section> 

<!-- Main content -->
<section class="content">
  <div class="row"> 
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-7">La Liste Des Courriers Sortantes</h3>
          <div class="box-tools col-md-5 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array( 'objet'=>'Objet', 'observation'=>'Observation', 'datecorrespondance'=>'Date de Courrier', 'destinataire'=>'Destinataire')),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('date de Courrier') ?></th>
                <th><?= $this->Paginator->sort('nombre de documents') ?></th>
                <th><?= $this->Paginator->sort('destinataire_id') ?></th>
                 <th><?= $this->Paginator->sort('telecharger_documents') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($correspondancesSortantes as $correspondancesSortante): ?>
              <tr>
                <td><?= $this->Number->format($correspondancesSortante->id) ?></td>
                 <td><?= h($correspondancesSortante->objet) ?></td>
                <td><?= h($correspondancesSortante->observation) ?></td>
                <td><?= h($correspondancesSortante->datecorrespondance) ?></td>
                <td><?= $this->Number->format($correspondancesSortante->nombredocuments) ?></td>
                <td><?= $correspondancesSortante->has('destinataire') ? $this->Html->link($correspondancesSortante->destinataire->nom, ['controller' => 'Destinataires', 'action' => 'view', $correspondancesSortante->destinataire->id]) : '' ?></td>
               
                 <td> <?php echo $this->Html->link('Download File','/img/Correspondances/Sortantes/' . $correspondancesSortante->fichier); ?>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $correspondancesSortante->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $correspondancesSortante->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $correspondancesSortante->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

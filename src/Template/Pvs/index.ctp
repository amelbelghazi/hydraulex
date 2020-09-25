<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pvs
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-6""><?= __('Liste des') ?> PV</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('marche_id'=>'marche', 'libelle'=>'libelle', 'numero'=>'numero', 'datePV'=>'date', 'types_PV_id'=>'types PV' )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('marche_id') ?></th>
                <th><?= $this->Paginator->sort('libelle') ?></th>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('datePV', ['label'=>'Date']) ?></th>
                <th><?= $this->Paginator->sort('types_PV_id', ['label'=>'Type']) ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($pvs as $pv): ?>
                <td><?= $this->Number->format($pv->id) ?></td>
                <td><?= $pv->has('marche') ? $this->Html->link(end($pv->marche->details_marches)->intitule, ['controller' => 'Marches', 'action' => 'view', $pv->marche->id]) : '' ?></td>
                <td><?= h($pv->libelle) ?></td>
                <td><?= $this->Number->format($pv->numero) ?></td>
                <td><?= h($pv->datePV) ?></td>
                <td><?= $pv->has('types_p_v') ? $this->Html->link($pv->types_p_v->libelle, ['controller' => 'TypesPvs', 'action' => 'view', $pv->types_p_v->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $pv->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $pv->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $pv->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

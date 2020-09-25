<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    ODS
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12"> 
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-6""><?= __('Liste des') ?> ODS</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('marche_id'=>'Marché', 'numero'=>'numero', 'dateODS'=>'Date' , 'types_ODS_id'=>'Type ODS'  )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('marche_id', ['label'=>'Marché']) ?></th>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('dateODS', ['label'=>'Date']) ?></th>
                <th><?= $this->Paginator->sort('types_ODS_id', ['label'=>'Type']) ?></th> 
               <!-- <th><?= $this->Paginator->sort('fichier') ?></th>-->
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($odss as $ods): ?>
              <tr>
                <td><?= $this->Number->format($ods->id) ?></td>
                <td><?= $ods->has('marche') ? $ods->marche->has('details_marches') ? $this->Html->link(end($ods->marche->details_marches)->intitule, ['controller' => 'Marches', 'action' => 'view', $ods->marche->id]) : '' :'' ?></td>
                <td><?= $this->Number->format($ods->numero) ?></td>
                <td><?= h($ods->dateODS) ?></td>
                <td><?= $ods->has('types_o_d_s') ? $this->Html->link($ods->types_o_d_s->libelle, ['controller' => 'TypesOdss', 'action' => 'view', $ods->types_o_d_s->id]) : '' ?></td>
               <!-- <td><?php if($ods->fichier != null) {?>
                            <span class="fa fa-paperclip"></span> 
                          <?php }?>
                </td>-->
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $ods->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $ods->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $ods->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

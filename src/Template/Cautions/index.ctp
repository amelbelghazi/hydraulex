 <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cautions
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">  
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-6""><?= __('Liste des') ?> Cautions</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('marche_id'=>'marche', 'numero'=>'numero', 'types_caution_id'=>'Types caution' )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                 <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('types_caution_id') ?></th>
                <th><?= $this->Paginator->sort('Totale ') ?></th>
                <th><?= $this->Paginator->sort('etat') ?></th>
                <th><?= $this->Paginator->sort('montant Rembourser') ?></th>
                <th><?= $this->Paginator->sort('fichier') ?></th>
                
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($cautions as $caution): //debug($caution);?>
              <tr>
                <td><?= $this->Number->format($caution->id) ?></td>
                <td> <?= end($caution->marche->details_marches)->intitule; ?></td>
                <td><?= $this->Number->format($caution->numero) ?></td>
                <td><?= $caution->has('types_caution') ? $this->Html->link($caution->types_caution->libelle, ['controller' => 'TypesCautions', 'action' => 'view', $caution->types_caution->id]) : '' ?></td>
                
                <td><?= number_format($caution->montant, 2, '.', ' '); ?> DA</td>
                <td><?= h($caution->etat) ?></td>
                
                 <?php if (empty($caution->remboursements_caution)){
                        echo  '<td> Non Rembourser </td>' ;
                  }else {
                      echo '<td>'.number_format(end($caution->remboursements_caution)->montant, 2, '.', ' ').' DA</td>';

                    } ?>
                    <td>
                     <?php if (!empty($caution->fichier)){ 

                          echo $this->Html->link('Télécharger','/files/Cautions/' . $caution->fichier);

                      }else{
                       echo  'Aucun ';
                        }?>
                 </td>
                
               
                <td class="actions" style="white-space:nowrap">
                 <?php if ($caution->etat=='Non Rembourser') {
                    echo $this->Form->button(__('Rembourser'), ['type'=>'button', 'data-toggle'=>'modal' ,'data-whatever'=>$caution->id ,'class' => 'btn btn-xs bg-olive dropdown-toggle', 'data-target'=>'#remboursementscautionPopup']);
                  
                  }else{ 
                     echo $this->Form->button(__('Rembourser'), ['type'=>'button', 'data-toggle'=>'modal' ,'data-whatever'=>$caution->id ,'class' => 'btn btn-xs bg-olive dropdown-toggle', 'data-target'=>'#remboursementscautionPopup','disabled']);
                  } ?>

                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $caution->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $caution->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $caution->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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
 <div aria-hidden="false" role="dialog" tabindex="-1" id="remboursementscautionPopup" class="modal leread-modal fade in">
                      <div class="modal-dialog">
                        <div id="login-content" class="modal-content" >
                          <div class="modal-body">
                            <?= $this->Form->create($RemboursementsCaution, array('id'=>'formremboursementscaution', 'role'=>'form', 'url'=>array('controller'=>'RemboursementsCaution', 'action' => 'add'))) ?>
                                <?php echo $this->element('form_remboursements-caution'); ?>
                              <?= $this->Form->end() ?>
                          </div>
                        </div>
                      </div>
                    </div>

<?php echo $this->element('popupwindowscript'); ?>
 
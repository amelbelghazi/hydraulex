<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Avances
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title col-md-6"><?= __('La liste des') ?> Avances</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array( 'dateremboursement'=>'date de remboursement', 'dateavance'=>'date d\'avance', 'marche_id'=>'marche')),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
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
                <th><?= $this->Paginator->sort('montant') ?></th>
                <th><?= $this->Paginator->sort('Reste') ?></th>
                 <th><?= $this->Paginator->sort('date avance') ?></th>
                <th><?= $this->Paginator->sort('date de remboursement') ?></th>
                <th><?= $this->Paginator->sort('fichier') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($avances as $avance): ?>
              <tr>
                <td><?= $this->Number->format($avance->id) ?></td>
                <td>
                    <?= $avance->has('marche') ? $avance->marche->has('details_marches') ? end($avance->marche->details_marches)->intitule : '' : ''; ?>
                </td>

                <td><?= number_format($avance->montant, 2, '.', ' ') ?> DA</td>
                <td>
                    <?php 
                      $montanttotal=0;
                      foreach($avance->remboursements_avance as $RemboursementAvance)
                      {
                       
                          $montanttotal=$montanttotal+($RemboursementAvance->montant);
                        
                      }
                      
                      $Reste=($avance->montant)-($montanttotal);
                      echo number_format($Reste, 2, '.', ' '); 
                    ?> DA
                </td>
                <td><?= h($avance->dateavance) ;  ?></td>
                <td><?= h($avance->dateremboursement) ?></td>
                 <td>
                     <?php if (!empty($avance->fichier)){ 

                          echo $this->Html->link('Télécharger','/files/Avances/' . $avance->fichier);

                      }else{
                       echo  'Aucun ';
                        }?>
                 </td>
                
                
                <td class="actions" style="white-space:nowrap">

                  <?php if ($Reste==0) {
                   echo $this->Form->button(__('Remborser'), ['type'=>'button', 'data-toggle'=>'modal' ,'data-whatever'=>$avance->id ,'class' => 'btn btn-xs bg-olive dropdown-toggle', 'data-target'=>'#remboursementsavancePopup','disabled']);
                  }else{ 
                    echo $this->Form->button(__('Rembourser'), ['type'=>'button', 'data-toggle'=>'modal' ,'data-whatever'=>$avance->id ,'class' => 'btn btn-xs bg-olive dropdown-toggle', 'data-target'=>'#remboursementsavancePopup']);
                  } ?>
                  
                  <?= $this->Html->link(__('voir'), ['action' => 'view', $avance->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'),['action' => 'edit', $avance->id], ['class'=>'btn btn-warning btn-xs'])?>
                  <?= $this->Form->postLink(__('supprimer'), ['action' => 'delete', $avance->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
              </tr>
            <?php endforeach;?>
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
 <div aria-hidden="false" role="dialog" tabindex="-1" id="remboursementsavancePopup" class="modal leread-modal fade in">
                      <div class="modal-dialog">
                        <div id="login-content" class="modal-content" >
                          <div class="modal-body">
                            <?= $this->Form->create($RemboursementsAvance, array('id'=>'formremboursementsavance', 'role'=>'form', 'url'=>array('controller'=>'RemboursementsAvance', 'action' => 'add'))) ?>
                                <?php echo $this->element('form_remboursements-avance'); ?>
                              <?= $this->Form->end() ?>
                          </div>
                        </div>
                      </div>
                    </div>

<?php echo $this->element('popupwindowscript'); ?>

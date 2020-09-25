<section class="content-header">
  <h1>
    <?php echo __('Caution'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Informations'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
                <div class="form-group has-feedback extraspace ">
                    <label for="march" class="col-sm-2 control-label ">marché</label>
                    <div class="col-sm-8">
                      <?= $caution->marche->has('details_marches') ? end($caution->marche->details_marches)->intitule : '' ?>
                    </div>

                </div>
                <div class="form-group has-feedback extraspace ">
                    <label for="numero" class="col-sm-2 control-label ">numero</label>
                    <div class="col-sm-8">
                     <?= $this->Number->format($caution->numero) ?>
                    </div>

                </div>

                <div class="form-group has-feedback extraspace ">
                    <label for="types_caution" class="col-sm-2 control-label ">types caution</label>
                    <div class="col-sm-8">
                     <?= $caution->has('types_caution') ? $this->Html->link($caution->types_caution->libelle, ['controller' => 'TypesCautions', 'action' => 'view', $caution->types_caution->id], ['class'=>'col-sm-2','style'=>'padding: 0px;']).'<label for="" class="col-sm-2 control-label ">'.h($caution->types_caution->pourcentage).' %</label>  ' : '' ?>  
                     
                    </div> 

                </div>
                <div class="form-group has-feedback extraspace ">
                    <label for="taux" class="col-sm-2 control-label ">Taux</label>
                    <div class="col-sm-8">
                      <?= h($caution->taux) ?> %
                    </div>

                </div>
                <div class="form-group has-feedback extraspace ">
                    <label for="etat" class="col-sm-2 control-label ">etat</label>
                    <div class="col-sm-8">
                      <?= h($caution->etat) ?>
                    </div>

                </div>
                
                <div class="form-group has-feedback extraspace ">
                    <label for="montant" class="col-sm-2 control-label ">Totale</label>
                    <div class="col-sm-8">
                     <?= number_format($caution->montant, 2, '.', ' ') ?> DA
                    </div>

                </div>
                 <div class="form-group has-feedback extraspace ">
                    <label for="montant" class="col-sm-2 control-label ">Montant Rembourser</label>
                    <div class="col-sm-8">
                       <?php if (empty($caution->remboursements_caution)){
                        echo  '<td> Non Rembourser </td>' ;
                  }else {
                      echo '<td>'.number_format(end($caution->remboursements_caution)->montant, 2, '.', ' ').' DA</td>';

                    } ?>
                    </div>

                </div>
                <div class="form-group has-feedback extraspace ">
                    <label for="fichier" class="col-sm-2 control-label ">Fichier</label>
                    <div class="col-sm-8">
                    <?php if (!empty($documents)){ 

                          echo $this->Html->link('Télécharger','/files/Cautions/' . $documents->document);

                      }else{
                       echo  'Aucun ';
                        }?>
                    </div>

                </div>
                 
                               
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Remboursements Caution']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($caution->remboursements_caution)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                                                    
                                    <th>
                                    Montant
                                    </th>

                                    <th>
                                    Dateremboursement
                                    </th>

                                    <th>
                                    Observation
                                    </th>


                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($caution->remboursements_caution as $remboursementsCaution): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($remboursementsCaution->id) ?>
                                    </td>

                                    <td>
                                    <?= h($remboursementsCaution->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($remboursementsCaution->dateremboursement) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($remboursementsCaution->observation) ?>
                                    </td>

                                    <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'RemboursementsCaution', 'action' => 'view', $remboursementsCaution->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'RemboursementsCaution', 'action' => 'edit', $remboursementsCaution->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RemboursementsCaution', 'action' => 'delete', $remboursementsCaution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $remboursementsCaution->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

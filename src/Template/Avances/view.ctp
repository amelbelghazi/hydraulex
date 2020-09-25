<section class="content-header">
  <h1>
    <?php echo __('Avance'); ?>
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
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header --> 
            <div class="box-body">
                <div class="form-group has-feedback extraspace">
                    <label for="Marche" class="col-sm-2 control-label ">Marché :</label>
                    <div class="col-sm-10">
                        <?=  end($avance->marche->details_marches)->intitule; ?>
                    </div>
                </div>
                
                <div class="form-group has-feedback extraspace">
                    <label for="dateavance" class="col-sm-2 control-label ">Date d'avance :</label>
                    <div class="col-sm-10">
                       <?php echo $avance->dateavance;?> 
                    </div>
                </div>
                <div class="form-group has-feedback extraspace">
                    <label for="Montant" class="col-sm-2 control-label ">Montant :</label>
                    <div class="col-sm-10">
                        <?= number_format($avance->montant, 2, '.', ' ') ?> DA
                    </div>
                </div>
                <div class="form-group has-feedback extraspace">
                    <label for="Reste" class="col-sm-2 control-label ">Reste :</label>
                    <div class="col-sm-10">
                       <?php 
                      $montanttotal=0;
                      foreach($RemboursementsAvance as $RemboursementAvance)
                      {
                        if ($RemboursementAvance->avance_id==$avance->id) 
                        {
                          $montanttotal=$montanttotal+($RemboursementAvance->montant);
                        }
                      }
                      $Reste=($avance->montant)-($montanttotal);
                      echo number_format($Reste, 2, '.', ' '); 
                    ?> DA
                    </div>
                </div>
                <div class="form-group has-feedback extraspace">
                    <label for="dateremboursement" class="col-sm-2 control-label ">Date de remboursement: </label>
                    <div class="col-sm-10">
                       <?php echo $avance->dateremboursement;?> 
                    </div>
                </div>
                <div class="form-group has-feedback extraspace">
                    <label for="dateremboursement" class="col-sm-2 control-label ">Fichier :</label>
                    <div class="col-sm-10">
                       <?php if (!empty($documents)){ 

                          echo $this->Html->link('Télécharger','/files/Avances/' . $documents->document);

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
                    <h3 class="box-title"><?= __('Remboursements Avance') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($avance->remboursements_avance)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                    <th>
                                    Date de remboursement
                                    </th>                           
                                    <th>
                                    Montant
                                    </th>                         
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($avance->remboursements_avance as $remboursementsAvance): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($remboursementsAvance->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($remboursementsAvance->dateremboursement) ?>
                                    </td>                               
                                    <td>
                                    <?= h(number_format($remboursementsAvance->montant, 2, '.', ' '))  ?> DA
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'RemboursementsAvance', 'action' => 'view', $remboursementsAvance->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'RemboursementsAvance', 'action' => 'edit', $remboursementsAvance->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RemboursementsAvance', 'action' => 'delete', $remboursementsAvance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $remboursementsAvance->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

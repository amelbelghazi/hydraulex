<section class="content-header">
  <h1>
    <?php echo __('Marche'); ?>
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
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#Details" data-toggle="tab">Details</a></li>
                    <li><a href="#VisaCF" data-toggle="tab">Visa CF</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane"  id="Details">
                      <div class="form-group has-feedback extraspace">
                        <label for="intitule" class="col-sm-2 control-label ">Intitulé</label>
                        <div class="col-sm-10">
                          <?= $marche->has('affaire') ? $marche->affaire->intitule : '' ?>
                        </div>
                      </div>
                      <div class="form-group has-feedback extraspace">
                        <label for="maitres_oeuvre_id" class="col-sm-2 control-label ">Maitre d'oeuvre</label>
                        <div class="col-sm-10">
                          <?= $marche->has('maitres_oeuvre') ? $marche->maitres_oeuvre->id : '' ?>
                        </div>
                      </div>
                      <div class="form-group has-feedback extraspace">
                        <label for="numero" class="col-sm-2 control-label ">Numéro du marché</label>
                        <div class="col-sm-10">
                          <?= $this->Number->format($marche->numero) ?>
                        </div>
                      </div>
                      <div class="form-group has-feedback extraspace">
                        <label for="montant" class="col-sm-2 control-label ">Montant </label>
                        <div class="col-sm-10">
                          <?= $marche->has('details_marches') ? end($marche->details_marches)->montant : '' ?>
                        </div>
                      </div>
                      <div class="form-group has-feedback extraspace">
                        <label for="delai" class="col-sm-2 control-label ">Délai </label>
                        <div class="col-sm-10">
                          <?= $marche->has('details_marches') ? end($marche->details_marches)->delai : '' ?>
                        </div>
                      </div>
                      <div class="form-group has-feedback extraspace">
                        <label for="etat_id" class="col-sm-2 control-label ">Etat</label>
                        <div class="col-sm-10">
                          <?= $marche->has('etats_marches') ? end($marche->etats_marches)->etat->libelle : '' ?>
                        </div>
                      </div> 
                      <div class="form-group has-feedback extraspace">
                        <label for="etat_id" class="col-sm-2 control-label ">documents</label>
                        <div class="col-sm-10">
                           <?php if (!empty($documents)){ 

                          echo $this->Html->link('Télécharger','/files/Marches/' . $documents->document);

                      }else{
                       echo  'Aucun ';
                        }?>
                        </div>
                      </div> 
                    </div>
                    <div class="tab-pane"  id="VisaCF">
                      <div class="form-group has-feedback extraspace">
                        <label for="numero" class="col-sm-2 control-label ">Numéro du visa</label>
                        <div class="col-sm-10">
                          <?= $marche->has('visas_cf') ? end($marche->visas_cf)->numero : '' ?>
                        </div>
                      </div> 
                      <div class="form-group has-feedback extraspace">
                        <label for="delai" class="col-sm-2 control-label ">Date du visa </label>
                        <div class="col-sm-10">
                          <?= $marche->has('visas_cf') ? end($marche->visas_cf)->datevisa : '' ?>
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
                    <h3 class="box-title"><?= __('{0}', ['Avances']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->avances)): ?>

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
                                    Numero
                                    </th>                           
                                    <th>
                                    Dateremboursement
                                    </th>                          
                                    <th>
                                    Dateavance
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->avances as $avances): ?>
                                <tr>                                  
                                    <td>
                                    <?= h($avances->id) ?>
                                    </td>                               
                                    <td>
                                    <?= h($avances->montant) ?>
                                    </td>                              
                                    <td>
                                    <?= h($avances->numero) ?>
                                    </td>                             
                                    <td>
                                    <?= h($avances->dateremboursement) ?>
                                    </td>                              
                                    <td>
                                    <?= h($avances->dateavance) ?>
                                    </td>
                                    
                                     <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Avances', 'action' => 'view', $avances->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Avances', 'action' => 'edit', $avances->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Avances', 'action' => 'delete', $avances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $avances->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Avenants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->avenants)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                              
                                    <th>
                                    Id
                                    </th>                             
                                    <th>
                                    Dateavenant
                                    </th>                             
                                    <th>
                                    Numero
                                    </th>                               
                                    <th>
                                    Objet
                                    </th>                                  
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->avenants as $avenants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($avenants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avenants->dateavenant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avenants->numero) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avenants->objet) ?>
                                    </td>
                                    
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Avenants', 'action' => 'view', $avenants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Avenants', 'action' => 'edit', $avenants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Avenants', 'action' => 'delete', $avenants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $avenants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Cautions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->cautions)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                               
                                    <th>
                                    Id
                                    </th>                              
                                    <th>
                                    Types Caution Id
                                    </th>                             
                                    <th>
                                    Numero
                                    </th>                            
                                    <th>
                                    Montant
                                    </th>                            
                                    <th>
                                    Etat
                                    </th>                                
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->cautions as $cautions): ?>
                                <tr>                                
                                    <td>
                                    <?= h($cautions->id) ?>
                                    </td>                                 
                                    <td>
                                    <?= h($cautions->types_caution_id) ?>
                                    </td>                               
                                    <td>
                                    <?= h($cautions->numero) ?>
                                    </td>                               
                                    <td>
                                    <?= h($cautions->montant) ?>
                                    </td>                             
                                    <td>
                                    <?= h($cautions->etat) ?>
                                    </td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Cautions', 'action' => 'view', $cautions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Cautions', 'action' => 'edit', $cautions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Cautions', 'action' => 'delete', $cautions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cautions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Chantiers']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->chantiers)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                              
                                    <th>
                                    Id
                                    </th>                            
                                    <th>
                                    Libelle
                                    </th>                              
                                    <th>
                                    Responsable Id
                                    </th>                                  
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->chantiers as $chantiers): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($chantiers->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chantiers->libelle) ?>
                                    </td>                                
                                    <td>
                                    <?= h($chantiers->responsable_id) ?>
                                    </td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Chantiers', 'action' => 'view', $chantiers->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Chantiers', 'action' => 'edit', $chantiers->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Chantiers', 'action' => 'delete', $chantiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chantiers->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Correspondances']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->correspondances)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                               
                                    <th>
                                    Id
                                    </th>                              
                                    <th>
                                    Numero
                                    </th>                                
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->correspondances as $correspondances): ?>
                                <tr>                                 
                                    <td>
                                    <?= h($correspondances->id) ?>
                                    </td>                              
                                    <td>
                                    <?= h($correspondances->numero) ?>
                                    </td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Correspondances', 'action' => 'view', $correspondances->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Correspondances', 'action' => 'edit', $correspondances->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Correspondances', 'action' => 'delete', $correspondances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $correspondances->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Details Marches']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <?php if (!empty($marche->details_marches)): ?>
                    <table class="table table-hover">
                        <tbody>
                            <tr>                              
                                    <th>
                                    Id
                                    </th>                             
                                    <th>
                                    Datedetails
                                    </th>                             
                                    <th>
                                    Avenant Id
                                    </th>                             
                                    <th>
                                    Intitule
                                    </th>                               
                                    <th>
                                    Montant
                                    </th>                            
                                    <th>
                                    Delai
                                    </th>                               
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->details_marches as $detailsMarches): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($detailsMarches->id) ?>
                                    </td>                               
                                    <td>
                                    <?= h($detailsMarches->datedetails) ?>
                                    </td>                                 
                                    <td>
                                    <?= h($detailsMarches->avenant_id) ?>
                                    </td>                               
                                    <td>
                                    <?= h($detailsMarches->intitule) ?>
                                    </td>                              
                                    <td>
                                    <?= h($detailsMarches->montant) ?>
                                    </td>                                
                                    <td>
                                    <?= h($detailsMarches->delai) ?>
                                    </td>      
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'DetailsMarches', 'action' => 'view', $detailsMarches->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'DetailsMarches', 'action' => 'edit', $detailsMarches->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'DetailsMarches', 'action' => 'delete', $detailsMarches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsMarches->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Devis']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->devis)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                               
                                    <th>
                                    Id
                                    </th>                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->devis as $devis): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($devis->id) ?>
                                    </td>
                                         
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Devis', 'action' => 'view', $devis->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Devis', 'action' => 'edit', $devis->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Devis', 'action' => 'delete', $devis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devis->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Projets Soustraitant']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->projets_soustraitant)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                                 
                                    <th>
                                    Id
                                    </th>                               
                                    <th>
                                    Soustraitant Id
                                    </th>                            
                                    <th>
                                    Duree
                                    </th>                            
                                    <th>
                                    Montant
                                    </th>                                     
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->projets_soustraitant as $projetsSoustraitant): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->id) ?>
                                    </td>                                 
                                    <td>
                                    <?= h($projetsSoustraitant->soustraitant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->duree) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->montant) ?>
                                    </td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'ProjetsSoustraitant', 'action' => 'view', $projetsSoustraitant->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'ProjetsSoustraitant', 'action' => 'edit', $projetsSoustraitant->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'ProjetsSoustraitant', 'action' => 'delete', $projetsSoustraitant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetsSoustraitant->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Pvs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->pvs)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                                
                                    <th>
                                    Id
                                    </th>                              
                                    <th>
                                    DatePV
                                    </th>                             
                                    <th>
                                    Libelle
                                    </th>                             
                                    <th>
                                    Numero
                                    </th>                              
                                    <th>
                                    Types PV Id
                                    </th>                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->pvs as $pvs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($pvs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($pvs->datePV) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($pvs->libelle) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($pvs->numero) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($pvs->types_PV_id) ?>
                                    </td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Pvs', 'action' => 'view', $pvs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Pvs', 'action' => 'edit', $pvs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Pvs', 'action' => 'delete', $pvs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pvs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Visas Cf']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->visas_cf)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>
                                Id
                                </th>                           
                                <th>
                                Datevisa
                                </th>                            
                                <th>
                                Numero
                                </th>                                     
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->visas_cf as $visasCf): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($visasCf->id) ?>
                                    </td>                               
                                    <td>
                                    <?= h($visasCf->datevisa) ?>
                                    </td>                                
                                    <td>
                                    <?= h($visasCf->numero) ?>
                                    </td>  
                                    
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'VisasCf', 'action' => 'view', $visasCf->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'VisasCf', 'action' => 'edit', $visasCf->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'VisasCf', 'action' => 'delete', $visasCf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visasCf->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('{0}', ['Etats']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marche->etats)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                         
                                    <th>
                                    Id
                                    </th>                           
                                    <th>
                                    Libelle
                                    </th>                                  
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marche->etats as $etats): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etats->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etats->libelle) ?>
                                    </td>
                                    
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Etats', 'action' => 'view', $etats->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Etats', 'action' => 'edit', $etats->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Etats', 'action' => 'delete', $etats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etats->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

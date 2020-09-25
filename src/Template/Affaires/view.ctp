<section class="content-header">
  <h1>
    <?php echo __('Appel d\'offre'); ?>
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
        
        <section class="col-lg-8 connectedSortable">
           
            <div class="box box-info ">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title"><?php echo __('Informations'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group has-feedback extraspace">
                      <label for="intitule" class="col-sm-2 control-label ">Intitulé</label>
                      <div class="col-sm-10">
                       <?= h($affaire->intitule)?>
                      </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label for="categories_affaire_id" class="col-sm-2 control-label ">Catégorie</label>
                      <div class="col-sm-10">
                        <?= $affaire->has('categories_affaire') ? $affaire->categories_affaire->libelle : '' ?>
                      </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label for="maitres_ouvrage_id" class="col-sm-2 control-label ">Maitre d'ouvrage</label>
                      <div class="col-sm-10">
                        <?= $affaire->has('maitres_ouvrage') ? $affaire->maitres_ouvrage->nom : '' ?>
                      </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label for="wilaya_id" class="col-sm-2 control-label ">Wilaya</label>
                      <div class="col-sm-10">
                        <?= $affaire->has('wilaya') ? $affaire->wilaya->nom : '' ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $affaire->id], ['class'=>'btn btn-warning btn-flat']) ?>
                      </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <div class="col-sm-10">
                        <i class="fa fa-share-alt"></i>
                        <h3 class="box-title"><?= __(' {0}', ['Marches']) ?></h3>
                    </div>
                    
                </div>
                    <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                    <?php if (!empty($affaire->marches)): ?>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Id</th>
                                    <th>Numero</th>
                                    <th>Intitule Marché</th>
                                     <th>Maitres Oeuvres</th>
                                    <th>Date de marchè </th>
                                    <th>Delai </th>
                                    <th>Montant</th>
                                   
                                    <th><?php echo __('Actions'); ?></th>
                                </tr>
                                <?php  foreach ($affaire->marches as $marches): ?>
                                <tr>
                                    <td><?= h($marches->id) ?></td>
                                    <td><?= h($marches->numero) ?></td>
                                    <td><?= h(end($marches->details_marches)->intitule) ?></td>
                                    <td><?= h($marches->maitres_oeuvre->nom) ?></td>
                                    <td class="font-date"><?= h(end($marches->details_marches)->datedetails) ?></td>
                                    <td class="font-delai"><?= h(end($marches->details_marches)->delai).' /Mois' ?></td>
                                    <td class="font-montant"><?= h(number_format(end($marches->details_marches)->montant, 2, '.', ' ').' DA') ?></td>
                                    
                                    <td class="actions">
                                        <?= $this->Html->link(__('Voir'), ['controller' => 'Marches', 'action' => 'view', $marches->id], ['class'=>'btn btn-info btn-xs']) ?>
                                        <?= $this->Html->link(__('Editer'), ['controller' => 'Marches', 'action' => 'edit', $marches->id], ['class'=>'btn btn-warning btn-xs']) ?>
                                        <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Marches', 'action' => 'delete', $marches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marches->id), 'class'=>'btn btn-danger btn-xs']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                    <!-- /.box-body -->
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <div class="col-sm-10">
                        <i class="fa fa-share-alt"></i>
                        <h3 class="box-title"><?= __(' {0}', ['Soumissions']) ?></h3>
                    </div>
                    <div class="col-sm-2">
                    <?= $this->Html->link(__('Ajouter'), ['controller' => 'Soumissions', 'action' => 'add'], ['class'=>'btn bg-navy btn-xs']) ?>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($affaire->soumissions)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <th>Soumissionnaire</th>
                                <th>Delai</th>
                                <th>Montant</th>                               
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($affaire->soumissions as $soumissions): ?>
                                <tr>                                 
                                    <td><?= h($soumissions->id) ?></td>                              
                                    <td><?= h($soumissions->soumissionnaire->nom) ?></td>                               
                                    <td class="font-delai"><?= h($soumissions->delais).' /Mois' ?></td>                             
                                    <td class="font-montant"><?= h(number_format($soumissions->montant, 2, '.', ' ').' DA') ?></td> 
                                    
                                    <td class="actions">
                                        <?= $this->Html->link(__('Voir'), ['controller' => 'Soumissions', 'action' => 'view', $soumissions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                        <?= $this->Html->link(__('Editer'), ['controller' => 'Soumissions', 'action' => 'edit', $soumissions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                        <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Soumissions', 'action' => 'delete', $soumissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $soumissions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <section class="col-lg-4 connectedSortable">

                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-share-alt"></i>
                        <h3 class="box-title"><?= __('{0} :', ['Etats']) ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                    <?php if (!empty($affaire->etats_affaires)): ?>

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                   <th>Id</th>
                                   <th>Etat affaires</th>                              
                                <th>
                                    <?php echo __('Opérations'); ?>
                                </th>
                                </tr>
                                <?php foreach ($affaire->etats_affaires as $etatsaffaire): ?>
                                    <tr>                                 
                                        <td><?= h($etatsaffaire->id) ?></td>                               
                                        <td>
                                            <span class="label <?php if ($etatsaffaire->etat->libelle=="En cours"){ echo "label-primary"; }elseif (($etatsaffaire->etat->libelle=="Terminé")||($etatsaffaire->etat->libelle=="Cloture") ){
                                                echo "label-success";
                                            }elseif (($etatsaffaire->etat->libelle=="Arrete")||($etatsaffaire->etat->libelle=="Suspendu")) {
                                                echo "label-danger";
                                            }elseif ($etatsaffaire->etat->libelle=="Archive") {
                                                 echo "label-default";
                                            }?>"><?= h($etatsaffaire->etat->libelle) ?></span>
                                            </td> 
                                        <td class="actions">
                                            <?= $this->Html->link(__('Voir'), ['controller' => 'EtatsAffaires', 'action' => 'view', $etatsaffaire->id], ['class'=>'btn btn-info btn-xs']) ?>

                                            <?= $this->Html->link(__('Editer'), ['controller' => 'EtatsAffaires', 'action' => 'edit', $etatsaffaire->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                            <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'EtatsAffaires', 'action' => 'delete', $etatsaffaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etatsaffaire->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                        
                            </tbody>
                        </table>

                    <?php endif; ?>

                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <div class="col-sm-10">
                            <i class="fa fa-share-alt"></i>
                            <h3 class="box-title"><?= __('{0} :', ['Commissions']) ?></h3>
                        </div>
                        <div class="col-sm-2">
                        <button data-toggle="modal" data-target="#CommissionPopup" class="btn bg-navy btn-xs">
                            <?=__('Ajouter')?>
                        </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                    <?php if (!empty($affaire->commissions)): ?>

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Id</th>                             
                                    <th>date de la commission</th>
                                    <th>
                                        <?php echo __('Opérations'); ?>
                                    </th>
                                </tr>
                                <?php foreach ($affaire->commissions as $commissions): ?>
                                    <tr>                                 
                                        <td><?= h($commissions->id) ?></td>                               
                                        <td class="font-date"><?= h($commissions->datecommission) ?></td> 
                                        <td class="actions">
                                            <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Commissions', 'action' => 'delete', $commissions->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>    
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                        
                            </tbody>
                        </table>

                    <?php endif; ?>

                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <div class="col-sm-10">                                          
                            <i class="fa fa-share-alt"></i>
                            <h3 class="box-title"><?= __(' {0}', ['Frais Projet']) ?></h3>
                        </div>
                        <div class="col-sm-2">
                        <?= $this->Html->link(__('Ajouter'), ['controller' => 'FraisProjets', 'action' => 'add'], ['class'=>'btn bg-navy btn-xs']) ?>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">

                    <?php  if (!empty($affaire->frais_projets)): ?>

                        <table class="table table-hover">
                            <tbody>
                                <tr>                                 
                                    <th>Id</th>                             
                                    <th>Montant</th>                             
                                    <th>date frais</th>
                                                                    
                                    <th>
                                        <?php echo __('Actions'); ?>
                                    </th>
                                </tr>

                                <?php  foreach ($affaire->frais_projets as $fraisProjet): ?>
                                    <tr>
                                        <td><?= h($fraisProjet->id) ?></td>
                                        <td class="font-montant"><?= h(number_format($fraisProjet->total, 2, '.', ' ').' DA') ?></td>
                                        <td class="font-date"><?= h($fraisProjet->datefrais) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Voir'), ['controller' => 'FraisProjets', 'action' => 'view', $fraisProjet->id], ['class'=>'btn btn-info btn-xs']) ?>

                                            <?= $this->Html->link(__('Editer'), ['controller' => 'FraisProjets', 'action' => 'edit', $fraisProjet->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                            <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'FraisProjets', 'action' => 'delete', $fraisProjet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fraisProjet->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                        
                            </tbody>
                        </table>

                    <?php endif; ?>

                    </div>
                    <!-- /.box-body -->
                </div>

        </section>

    </div>
</section>
<!--
  Partie commission
-->
<div aria-hidden="false" role="dialog" tabindex="-1" id="CommissionPopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
<?= $this->Form->create($commission, array('id'=>'formCommission', 'role'=>'form', 'url'=>array('controller'=>'Commissions', 'action' => 'add'))) ?>
  <div class="box-body">
    <div class="form-group has-feedback extraspace">
      <label class="col-sm-2 control-label ">Affaire</label>
      <div class="col-sm-10">
        <label>
            <?php echo h($affaire->intitule); ?>
        </label>
      </div>
    </div>
    <?php echo $this->Form->input('affaire_id', ['type'=>'text', 'name'=>'affaire_id', 'label'=>false, 'value'=>h($affaire->id), 'class'=>'hidden']);?>
    <div class="form-group has-feedback extraspace">  
      <label for="datecommision" class="col-sm-2 control-label ">Date de la commission</label>
      <div class="col-sm-10">
        <?php echo $this->Form->input('datecommision', ['empty' => true, 'label'=>false, 'default' => '', 'class' => 'datepicker', 'type' => 'text']);?>
      </div>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox">
          Ajouter à l'agenda
        </label>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-warning btn-flat']) ?>
      </div>
    </div>
  </div>
<?= $this->Form->end() ?>
        </div>
    </div>
  </div>
</div>

<?php
$this->Html->css([
    '/plugins/iCheck/flat/blue',
    '/plugins/morris/morris',
    '/plugins/jvectormap/jquery-jvectormap-1.2.2',
    '/plugins/datepicker/datepicker3',
    '/plugins/daterangepicker/daterangepicker',
    '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
  '/plugins/morris/morris.min',
  '/plugins/sparkline/jquery.sparkline.min',
  '/plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  '/plugins/jvectormap/jquery-jvectormap-world-mill-en',
  '/plugins/knob/jquery.knob',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  '/plugins/daterangepicker/daterangepicker',
  '/plugins/datepicker/bootstrap-datepicker',
  '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
  '/js/pages/dashboard',
],
['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
<?php  $this->end(); ?>

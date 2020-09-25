<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Appel d'offre
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content --> 
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box  box-info">
        <div class="box-header">
          <h3 class="box-title col-md-8" style="    padding: 26px;"><?= __('Liste des ') ?> appels d'offre</h3>

          <div class="box-tools col-md-4 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array( 'intitule'=>'Intitulé', 'dateaffaire'=>'date', 'categories_affaire_id'=>'Catégorie', 'maitres_ouvrage_id'=>'Maitre d\'ouvrage', 'wilaya_id'=>'wilaya', 'types_affaire_id'=>'Type','datecommission'=>'date commissions', 'etats_affaire_id'=>'Etat' )),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
                <?php echo $this->Form->input('search', array('label'=>false,'class'=>'form-control col-md-4','placeholder'=>'Remplissez pour lancer la recherche','type'=>'text','style'=>'  padding:0px;  width: auto;' )); ?>
              <div class="input-group col-md-1 " >
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
                <th><?= $this->Paginator->sort('intitule', ['label'=>'Intitulé']) ?></th>
                <th><?= $this->Paginator->sort('date', ['label'=>'Date']) ?></th>
                <th><?= $this->Paginator->sort('categories_affaire_id', ['label'=>'Catégorie']) ?></th>
                <th><?= $this->Paginator->sort('maitres_ouvrage_id', ['label'=>'Maitre d\'ouvrage']) ?></th>
                <th><?= $this->Paginator->sort('wilaya_id') ?></th>
                <th><?= $this->Paginator->sort('types_affaire_id', ['label'=>'Type']) ?></th>  
                <th><?= $this->Paginator->sort('date', ['label'=>'Date commissions']) ?></th>
                <th><?= $this->Paginator->sort('etats_affaire_id', ['label'=>'Etat']) ?></th>

                <th><?= __('Opérations') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($affaires as $affaire): ?>
              <tr>
                <td><?= $this->Number->format($affaire->id) ?></td>
                <td><?= h($affaire->intitule) ?></td>
                <td class="font-date"><?= h($affaire->dateaffaire) ?></td>
                <td><?= $affaire->has('categories_affaire') ? $this->Html->link($affaire->categories_affaire->libelle, ['controller' => 'CategoriesAffaires', 'action' => 'view', $affaire->categories_affaire->id]) : '' ?></td>
                <td><?= $affaire->has('maitres_ouvrage') ? $this->Html->link($affaire->maitres_ouvrage->nom, ['controller' => 'MaitresOuvrages', 'action' => 'view', $affaire->maitres_ouvrage->id]) : '' ?></td>
                <td><?= $affaire->has('wilaya') ? $this->Html->link($affaire->wilaya->nom, ['controller' => 'Wilayas', 'action' => 'view', $affaire->wilaya->id]) : '' ?></td>
                <td><?= $affaire->has('types_affaire') ? $this->Html->link($affaire->types_affaire->libelle, ['controller' => 'TypesAffaires', 'action' => 'view', $affaire->types_affaire->id]) : '' ?></td>
                <td class="font-date"><?= h(end($affaire->commissions)->datecommission) ?></td>
                <td>
                <span style="" class="label <?php 
                                  if (!empty($affaire->etats_affaires)) {
                                     if (end($affaire->etats_affaires)->etat->libelle=="En cours")
                                          { 
                                            echo "label-primary"; 

                                          }elseif ((end($affaire->etats_affaires)->etat->libelle=="Terminé")||(end($affaire->etats_affaires)->etat->libelle=="Cloture") )
                                            {
                                              echo "label-success";
                                            }elseif ((end($affaire->etats_affaires)->etat->libelle=="Arrete")||(end($affaire->etats_affaires)->etat->libelle=="Suspendu"))
                                              {
                                                echo "label-danger";
                                              }elseif (end($affaire->etats_affaires)->etat->libelle=="Archive")
                                                {
                                                  echo "label-default";
                                                }
                                  } ?>">
                        <?= $affaire->has('etats_affaires') ? $this->Html->link(end($affaire->etats_affaires)->etat->libelle, ['controller' => 'EtatsAffaires', 'action' => 'view', end($affaire->etats_affaires)->id],['style'=>'color:#fff;']) : '' ?>
                  </span>

                    
                  
                </td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $affaire->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $affaire->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $affaire->id], ['class'=>'btn btn-danger btn-xs']) ?>
                  <?= end($affaire->etats_affaires)->etat->libelle=='En cours'? $this->Form->postLink(__('Arrêter'), ['action' => 'changerEtat', $affaire->id, 'arrete'], ['class'=>'btn btn-flat btn-xs bg-olive'])
                  : $this->Form->postLink(__('Reprendre'), ['action' => 'changerEtat', $affaire->id, 'En cours'], ['class'=>'btn btn-flat bg-olive btn-xs']);?>
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
<!--
  partie Etat affaire
-->
<div aria-hidden="false" role="dialog" tabindex="-1" id="EtatAffairePopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?= $this->Form->create($etatsAffaire, array('id'=>'formetatAffaire', 'role'=>'form', 'url'=>array('controller'=>'EtatsAffaires', 'action' => 'add'))) ?>
            <div class="form-group has-feedback extraspace">
              <label for="cause" class="col-sm-2 control-label ">Cause </label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('cause', ['type'=>'textbox', 'label'=>false]);?>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
               <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?> 
                </div>
              </div>
            </div>
          <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>
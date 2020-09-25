<section class="content-header">
  <h1>
    <?php echo __('Frais Projet'); ?>
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
                <dl class="dl-horizontal">
                    <div class="form-group has-feedback extraspace">
                      <label for="marche_id" class="col-sm-2 control-label">Intitulé</label>
                      <div class="col-sm-10">
                        <?= $fraisProjet->has('affaire') ? $fraisProjet->affaire->intitule : '' ?>
                      </div>
                    </div> 
                    <div class="form-group has-feedback extraspace">
                      <label for="marche_id" class="col-sm-2 control-label"><?= __('Date frais') ?></label>
                      <div class="col-sm-10">
                        <?= h($fraisProjet->datefrais) ?>
                      </div>
                    </div>  
                    <div class="form-group has-feedback extraspace">
                      <label for="marche_id" class="col-sm-2 control-label"><?= __('montant') ?></label>
                      <div class="col-sm-10">
                        <?= h($fraisProjet->total) ?>
                      </div>
                    </div>  
                     <div class="form-group has-feedback extraspace">
                  <label for="Documents" class="col-sm-2 control-label">Documents</label>
                  <div class="col-sm-10">
                    <?php if (!empty($documents)){ 

                          echo $this->Html->link('Télécharger','/files/FraisProjets/' . $documents->document);

                      }else{
                       echo  'Aucun ';
                        }?>
                  </div>
                </div>
                    <div class="panel-header with-border">
                      <h2 class="panel-title text-center">Détails des dépenses</h2>
                    </div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Type</th>
                          <th>Montant</th>
                          <th>Observation</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php if($fraisProjet->has('details_frais_projets')){
                      foreach($fraisProjet->details_frais_projets as $details) {?>
                      <tr>
                          <td>
                            <?= h($details->types_frais_id) ?>
                          </td>
                          <td ">
                            <?= h($details->montant) ?>
                          </td>
                          <td >
                            <?= h($details->observation) ?>
                          </td>  
                      </tr> 
                    <?php }}?> 
                     </tbody> 
                    </table>    
                </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

</section>

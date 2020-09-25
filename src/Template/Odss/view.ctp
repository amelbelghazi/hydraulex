<section class="content-header">
  <h1>
    <?php echo __('ODS'); ?>
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
            <div class="box-body">
                <dl class="dl-horizontal">
                    <div class="form-group has-feedback extraspace">
                      <label  class="col-sm-2 control-label ">Marche</label>
                      <div class="col-sm-10">
                        <?= $ods->has('marche') ? $ods->marche->has('details_marches') ?end($ods->marche->details_marches)->intitule : '' : '' ?>
                      </div> 
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label  class="col-sm-2 control-label ">Date</label>
                      <div class="col-sm-10">
                        <?= h($ods->dateODS) ?>
                      </div> 
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label class="col-sm-2 control-label ">Numéro</label>
                      <div class="col-sm-10">
                        <?= $this->Number->format($ods->numero)  ?>
                      </div> 
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label class="col-sm-2 control-label ">Type</label>
                      <div class="col-sm-10">
                        <?= $ods->has('types_o_d_s') ? $ods->types_o_d_s->libelle : '' ?>
                      </div> 
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label  class="col-sm-2 control-label ">Observation</label>
                      <div class="col-sm-10">
                        <?= h($ods->observation) ?>
                      </div> 
                    </div> 
                    <div class="form-group has-feedback extraspace">
                        <label  class="col-sm-2 control-label ">Pièce jointe :</label>
                        <div class="col-sm-10">
                           <?php if (!empty($documents)){ 
                              echo $this->Html->link('Télécharger','/files/ODS/' . $documents->document);
                          }else{
                           echo  'Aucune ';
                            }?>
                        </div>
                    </div>                   
                </dl>
            </div>
        </div>
    </div>
</div>

</section>

<section class="content-header">
  <h1>
    <?php echo __('Pv'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
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
                <dl class="dl-horizontal">
                    <div class="form-group has-feedback extraspace">
                        <label  class="col-sm-2 control-label ">Marche</label>
                        <div class="col-sm-10">
                          <?= $pv->has('marche') ? $pv->marche->id : '' ?>
                        </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                        <label  class="col-sm-2 control-label ">Libelle</label>
                        <div class="col-sm-10">
                          <?= h($pv->libelle) ?>
                        </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                        <label  class="col-sm-2 control-label ">Types</label>
                        <div class="col-sm-10">
                          <?= $pv->has('types_p_v') ? $pv->types_p_v->libelle : '' ?>
                        </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                        <label  class="col-sm-2 control-label ">Numéro</label>
                        <div class="col-sm-10">
                          <?= $this->Number->format($pv->numero) ?>
                        </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                        <label  class="col-sm-2 control-label ">Date</label>
                        <div class="col-sm-10">
                          <?= h($pv->datePV) ?>
                        </div>
                    </div>  
                    <div class="form-group has-feedback extraspace">
                        <label  class="col-sm-2 control-label ">Documents</label>
                        <div class="col-sm-10">
                           <?php if (!empty($documents)){ 
                              echo $this->Html->link('Télécharger','/files/Pvs/' . $documents->document);
                          }else{
                           echo  'Aucune ';
                            }?>
                        </div>
                    </div>      
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

<section class="content-header">
  <h1>
    <?php echo __('Task'); ?>
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
                <dl class="dl-horizontal">
                    <div class="form-group has-feedback extraspace ">
                    <label for="task" class="col-sm-2 control-label ">Intitule</label>
                    <div class="col-sm-8">
                      <?=  $task->intitule?>
                    </div>
                    </div> 
                     <div class="form-group has-feedback extraspace ">
                    <label for="task" class="col-sm-2 control-label ">Personnel</label>
                    <div class="col-sm-8">
                     <?=  $task->personne->nom  ?>
                     <?=  $task->personne->prenom  ?>
                    </div>
                     </div>

                    <div class="form-group has-feedback extraspace ">
                        <label for="task" class="col-sm-2 control-label ">Status</label>
                        <div class="col-sm-8">
                          <?= end($task->status)->types_status->libelle ?>
                        </div>
                    </div>
                    <div class="form-group has-feedback extraspace ">
                        <label for="task" class="col-sm-2 control-label ">Date de debut</label>
                        <div class="col-sm-8">
                          <?=  $task->datedebut?>
                        </div>

                    </div>
                         
                     <div class="form-group has-feedback extraspace ">
                        <label for="task" class="col-sm-2 control-label ">Date de fin</label>
                        <div class="col-sm-8">
                          <?=  $task->datefin ?>
                        </div>

                    </div> 

                

                      

                <div class="form-group has-feedback extraspace ">
                    <label for="task" class="col-sm-2 control-label ">Détails</label>
                    <div class="col-sm-8">
                    <?= $this->Text->autoParagraph(h($task->details)); ?>
                    
                    </div>

                </div>

               
           </div>
                                                                                                                                              </div>
        
    </div>
    
</div>


</section>

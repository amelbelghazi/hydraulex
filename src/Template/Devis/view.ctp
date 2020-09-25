<section class="content-header">
  <h1>
    <?php echo __('Devis'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>
<?php
    $counter = 1;
    $counter = isset($counter) ? $counter : '<%= counter %>';
?>
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
                <div class="form-group has-feedback extraspace">
                  <label for="marche_id" class="col-sm-2 control-label">Marché</label>
                  <div class="col-sm-10">
                    <?=
                      h(end($devi->marche->details_marches)->intitule);
                    ?>
                  </div>
                </div>
                <div class="form-group has-feedback extraspace">
                  <label for="intitule" class="col-sm-2 control-label">Intitulé du devis</label>
                  <div class="col-sm-10">
                    <?=
                      h($devi->intitule);
                    ?>
                  </div>
                </div>

                <div class="form-group has-feedback extraspace">
                  <label for="Documents" class="col-sm-2 control-label">Documents</label>
                  <div class="col-sm-10">
                    <?php if (!empty($documents)){ 

                          echo $this->Html->link('Télécharger','/files/Devis/' . $documents->document);

                      }else{
                       echo  'Aucun ';
                        }?>
                  </div>
                </div>

                <div class="panel panel-success no-border">
                    <div class="panel-header with-border">
                      <h2 class="panel-title text-center">Détails du devis</h2>
                    </div>
                      <div class="panel-body">
                          <div class="panel-group" id="accordion" role="tablist"
                            aria-multiselectable="true">
                            <?php if($devi->has('lots')){
                            foreach($devi->lots as $lot) {?>
                                <div class="col-sm-12" style="margin-bottom: 0;">
                                   <div class="panel no-border panel-default" id="panel<?php echo $counter?>" > 
                                      <div class="panel-heading" role="tab" id="heading<?php echo $counter?>" >
                                         <h4 class="panel-title">
                                            <div class="col-sm-1 no-padding">
                                               <input class = "form-control" value="<?= h($lot->numero)?>" disabled>
                                            </div>
                                            <div class="col-sm-11 no-padding">
                                                <input class = "form-control" value="<?=h($lot->intitule)?>" disabled>
                                            </div>
                                         </h4>
                                      </div>
                                 <?php
                                 $counter++; 
                                 if($lot->has('parties')){
                                 foreach($lot->parties as $partie) {?>
                                    <div class="col-sm-12" style="margin-bottom: 0;">
                                       <div class="panel no-border panel-default" id="panel<?php echo $counter?>">
                                          <div class="panel-heading" role="tab" id="heading<?php echo $counter?>">
                                             <h4 class="panel-title  no-border" >
                                                <div class="col-sm-1 no-padding">
                                                   <input class = "form-control" value="<?=h($partie->numero)?>" disabled>
                                                </div>
                                                <div class="col-sm-11 no-padding"> 
                                                   <input class = "form-control" value="<?=h($partie->libelle)?>"" disabled>
                                                </div>
                                             </h4>
                                          </div>
                                         <?php
                                         $counter++; 
                                         if($partie->has('articles')){
                                         foreach($partie->articles as $article) {?>
                                            <div class="col-sm-12" style="margin-bottom: 0;">
                                               <div class="panel no-border panel-default" id="panel<?php echo $counter?>">
                                                  <div class="panel-heading" role="tab" id="heading<?php echo $counter?>">
                                                     <h4 class="panel-title  no-border" >
                                                        <div class="col-sm-1 no-padding">
                                                           <input class = "form-control" value="<?=h($article->numero)?>" disabled>
                                                        </div>
                                                        <div class="col-sm-4 no-padding"> 
                                                           <input class = "form-control" value="<?=h($article->libelle)?>"" disabled> 
                                                        </div>
                                                        <div class="col-sm-2 no-padding"> 
                                                           <input class = "form-control" value="<?=h(end($article->details_article)->qte)?>"" disabled>
                                                        </div>
                                                        <div class="col-sm-2 no-padding"> 
                                                           <input class = "form-control" value="<?=h(end($article->details_article)->unite->signe)?>"" disabled>
                                                        </div>
                                                        <div class="col-sm-3 no-padding"> 
                                                           <input class = "form-control" value="<?=h(end($article->details_article)->prix)?> DA" disabled>
                                                        </div>
                                                     </h4>
                                                  </div>
                                               </div>
                                            </div>
                                         <?php
                                         $counter++; 
                                        };}?>
                                        </div>
                                    </div>
                                <?php };}?>
                                </div>
                                </div>
                               <?php };}?>
                          </div>
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

</section>

<section class="content-header">
  <h1>
    <?php echo __('Avenants'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>
<?php
    $counter = 1;
    $nblots = 0; 
    $nbpartie = 0;
    $nbarticle = 0;
    $counter = isset($counter) ? $counter : '<%= counter %>';
?>
<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Détails') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <div class="form-group has-feedback extraspace">
            <label for="details_marche_id" class="col-sm-2 control-label ">Marché </label>
            <div class="col-sm-10">
              <?= $avenant->has('marche') ? $avenant->marche->has('details_marches') ? h(end($avenant->marche->details_marches)->intitule) : '' : '';?>
            </div>
          </div>
          <div class="form-group has-feedback extraspace">
            <label for="numero" class="col-sm-2 control-label ">Numero </label>
            <div class="col-sm-10">
              <?= h($avenant->numero);?>
            </div>
          </div>
          <div class="form-group has-feedback extraspace">
            <label for="dateavenant" class="col-sm-2 control-label ">Date </label>
            <div class="col-sm-10">
              <?= h($avenant->dateavenant);?>
            </div>
          </div>
          <div class="form-group has-feedback extraspace">
            <label for="objet" class="col-sm-2 control-label ">Montant </label>
            <div class="col-sm-10">
              <?= h($avenant->montant);?>
            </div>
          </div>
          <div class="form-group has-feedback extraspace">
            <label for="numero" class="col-sm-2 control-label ">Délai </label>
            <div class="col-sm-10">
              <?= h($avenant->delai);?> mois
            </div>
          </div>
           <div class="form-group has-feedback extraspace">
            <label for="numero" class="col-sm-2 control-label ">Fichier </label>
            <div class="col-sm-10">
            <?php if (!empty($documents)){ 

                          echo $this->Html->link('Télécharger','/files/Avenants/' . $documents->document);

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
      </div>
    </div>
  </div>
</section>
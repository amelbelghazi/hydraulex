<section class="content-header">
  <h1>
    <?php echo __('Attachements Travaux'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>
<?php
    $counter = 1;
    $nbarticle = 0;
    $counter = isset($counter) ? $counter : '<%= counter %>';
?>
<!-- Main content -->
<div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Détails'); ?></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <dl class="dl-horizontal">
          <div class="form-group has-feedback extraspace">
              <label class="col-sm-2 control-label ">Marché :</label>
              <div class="col-sm-10">
                  <?= $attachementsTravaux->has('devi')? $attachementsTravaux->devi->intitule :''?>
              </div>
          </div>
          <div class="form-group has-feedback extraspace">
              <label class="col-sm-2 control-label ">Intitulé :</label>
              <div class="col-sm-10">
                  <?= h($attachementsTravaux->intitule) ?>
              </div>
          </div>
          <div class="form-group has-feedback extraspace">
              <label class="col-sm-2 control-label ">Date :</label>
              <div class="col-sm-10">
                  <?= h($attachementsTravaux->dateattachement) ?>
              </div>
          </div>
        </dl>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Contenu de l'attachement </h3>
        </div>
        <div class="box-body">
        <table class="table table-hover" id="frais-table">
          <thead>
            <tr>
              <th>Intitule</th>
              <th></th>
              <th></th>
              <th>Cumul</th>
              <th>Qte/mois</th>
              <th>Total/mois</th>
              <th>Reste</th>
            </tr>
          </thead>
          <tbody>
            <?php if($devi->has('lots')){
            foreach($devi->lots as $lot) {?> 
            <tr>
              <td colspan=8>
                <?= h($lot->numero);?>. <?= h($lot->intitule);?>
                <?php
                 $counter++;?>
              </td>
            </tr>
            <?php if($lot->has('parties')){
            foreach($lot->parties as $partie) {?>
            <tr>
              <td colspan=7>
               <?= h($lot->numero)?>.<?=h($partie->numero);?>. <?= h($partie->libelle);?>
                <?php $counter++;?>
             </td>
            </tr>
            <?php if($partie->has('articles')){
             foreach($partie->articles as $article) {?>
              <tr>
                <td class="col-sm-6">
                <?= h($lot->numero)?>.<?=h($partie->numero)?>.<?=h($article->numero)?>. <?= h($article->libelle)?>
                </td>
                <td class="col-sm-1">
                    <?=$article->has('details_article')? end($article->details_article)->qte : '0'?> <?= $article->has('details_article')? end($article->details_article)->unite->signe : ''?>
                </td>
                <td class="col-sm-1">
                  <?=$article->has('details_article')? end($article->details_article)->prix : '0'?> DA/U
                </td>
                <?php 
                  $sum = 0; $attachement = array(); 
                  if($article->has('details_article')){
                    foreach ($article->details_article as $details_article){
                      if($details_article->has('details_attachements')){
                        foreach ($details_article['details_attachements'] as $details) {
                          $sum += $details->qte; 
                        }
                      }
                    }
                  } 
                  $attachement = $attachementsTravaux['details_attachements'];  
                ?>
                <td class="col-sm-1 no-padding" style="text-align: center">
                  <?= h($sum - $attachement[$nbarticle]->qte) ?>
                </td>
                <td class="col-sm-1 no-padding" style="text-align: center">
                  <?= h($attachement[$nbarticle]->qte)?>
                </td>
                <td class="col-sm-1 no-padding" style="text-align: center">
                  <?= h($attachement[$nbarticle]->qte * end($article->details_article)->prix)?>DA
                </td>
                <td class="col-sm-1 no-padding" style="text-align: center">
                  <?= h(end($article->details_article)->qte  - $sum) ?> <?= $article->has('details_article')? end($article->details_article)->unite->signe : ''?>
                </td>
              </tr>
              <?php $counter++; $nbarticle++;}}}}}}?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</section>
      </div>
    </div>
  </div>
</div>

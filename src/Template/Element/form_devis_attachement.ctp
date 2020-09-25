<?php
    $counter = 1;
    $nbarticle = 0;
    $counter = isset($counter) ? $counter : '<%= counter %>';
?>
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
              <td colspan=7>
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
                <td class="hidden">
                  <input class="form-control" name="DetailsArticle[{<?= $nbarticle?>}][id]" value="<?=$article->has('details_article')? end($article->details_article)->id : ''?>" type="text">
                </td>
                <td class="col-sm-6">
                <?= h($lot->numero)?>.<?=h($partie->numero)?>.<?=h($article->numero)?>. <?= h($article->libelle)?>
                </td>
                <td class="col-sm-1 no-padding">
                    <?=$article->has('details_article')? end($article->details_article)->qte : '0'?> <?= $article->has('details_article')? end($article->details_article)->unite->signe : ''?>
                  <input placeholder="Qte" class="form-control Qte hidden" name="DetailsArticle[{<?= $nbarticle?>}][qte]" type="text" value="<?=$article->has('details_article')? end($article->details_article)->qte : '0'?>">
                </td>
                <td class="col-sm-1 no-padding">
                  <input placeholder="Prix unitaire" class="form-control Prix hidden" name="DetailsArticle[{<?= $nbarticle?>}][prix]" type="text" value="<?=$article->has('details_article')? end($article->details_article)->prix : '0'?>">
                  <?=$article->has('details_article')? end($article->details_article)->prix : '0'?>DA/U
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
                <td class="col-sm-1 no-padding">
                  <input placeholder="Cumul" class="form-control Cumul" name="DetailsArticle[{<?= $nbarticle?>}][Cumul]" type="text" value="<?= $sum - $attachement[$nbarticle]->qte?>">
                </td>
                <td class="col-sm-1 no-padding">
                  <input placeholder="Qte du mois" class="form-control QteMois" name="DetailsArticle[{<?= $nbarticle?>}][qtemois]" type="text" value="<?= $attachement[$nbarticle]->qte?>">
                </td>
                <td class="col-sm-1 no-padding">
                  <input placeholder="Total mois" class="form-control TotalMois" name="DetailsArticle[{<?= $nbarticle?>}][total]" type="text" value="<?= $attachement[$nbarticle]->qte * end($article->details_article)->prix?>">
                </td>
                <td class="col-sm-1 no-padding">
                  <input placeholder="Reste" class="form-control Reste" name="DetailsArticle[{<?= $nbarticle?>}][reste]" type="text" value="<?=$article->has('details_article')? end($article->details_article)->qte  - $sum: '0'?>">
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
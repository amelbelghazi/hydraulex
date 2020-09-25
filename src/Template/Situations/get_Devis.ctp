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
          <h3 class="box-title">Contenu de la situation </h3>
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
            foreach($devi->lots as $lot) {
              $nbArticleNonNull = 0;
              foreach ($lot->parties as $partie){
                foreach ($partie->articles as $article){
                  foreach ($article->details_article as $details_article){
                    if($details_article->has('details_attachements')){
                      foreach ($details_article['details_attachements'] as $details) {
                        if ($details->id == $attachementsTravaux->id){
                          if ($details->qte != 0) 
                            $nbArticleNonNull ++; 
                          break; 
                        }
                      }
                    }
                  }
                }
              }
              if($alote != 'false' && $nbArticleNonNull != 0){?> 
                <tr>
                  <td colspan=7>
                    <?= h($lot->numero);?>. <?= h($lot->intitule);?>
                    <?php
                     $counter++;?>
                  </td>
                </tr>
            <?php }
             if($lot->has('parties')){
            foreach($lot->parties as $partie) {
              $nbArticleNonNull = 0;
              foreach ($partie->articles as $article){
                foreach ($article->details_article as $details_article){
                  if($details_article->has('details_attachements')){
                    foreach ($details_article['details_attachements'] as $details) {
                      if ($details->id == $attachementsTravaux->id){
                        if ($details->qte != 0) 
                          $nbArticleNonNull ++; 
                        break; 
                      }
                    }
                  }
                }
              }
              if($alote != 'false' && $nbArticleNonNull!=0){?>
            <tr>
              <td colspan=7>
               <?= h($lot->numero)?>.<?=h($partie->numero);?>. <?= h($partie->libelle);?>
                <?php $counter++;?>
             </td>
            </tr>
            <?php }
            if($partie->has('articles')){
             foreach($partie->articles as $article) {
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
              if(($tous == 'true') || ($tous=='false' && $attachement[$nbarticle]->qte != 0)) {?>
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
                <td class="col-sm-1 titles">
                    <?= h($sum - $attachement[$nbarticle]->qte)?> <?= $article->has('details_article')? end($article->details_article)->unite->signe : ''?>
                </td>
                <td class="col-sm-1 titles">
                  <?= h($attachement[$nbarticle]->qte)?> <?= $article->has('details_article')? end($article->details_article)->unite->signe : ''?>
                </td>
                <td class="col-sm-1 titles">
                  <?= h($attachement[$nbarticle]->qte * end($article->details_article)->prix)?> DA
                </td>
                <td class="col-sm-1 titles">
                  <?= h($article->has('details_article')? end($article->details_article)->qte  - $sum: '0')?> <?= $article->has('details_article')? end($article->details_article)->unite->signe : ''?>
                </td>
              </tr>
              <?php }
              $counter++; $nbarticle++;}}}}}}?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</section>
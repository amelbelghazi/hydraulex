<?php
    $counter = 1;
    $nblots = 0; 
    $nbpartie = 0;
    $nbarticle = 0;
    $counter = isset($counter) ? $counter : '<%= counter %>';
?>
<div class="panel-body">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php if($devi->has('lots')){
          foreach($devi->lots as $lot) {?>                                   
        <div class="col-sm-12" style="margin-bottom: 0;">
          <div class="panel no-border panel-default" id="panel<?= $counter?>">
            <div class="panel-heading" role="tab" id="heading<?= $counter?>">
              <h4 class="panel-title">
                <div class="col-sm-1 no-padding hidden">
                  <input class="form-control" name="Lots[{<?= $nblots?>}][id]" value="<?=$lot->id?>">
                </div>
                <div class="col-sm-1 no-padding">
                  <input placeholder="N° du lot" class="form-control" name="Lots[{<?= $nblots?>}][numero]" value="<?=$lot->numero?>" type="text">
                </div>
                <div class="col-sm-11 no-padding">
                  <input placeholder="intitulé du lot" class="Lot form-control" name="Lots[{<?= $nblots?>}][intitule]" type="text" value="<?=$lot->intitule?>">
                </div>
                <div class="actions_div" style="position: relative; top: -26px;">
                  <a href="#" accesskey="<?= $counter?>" class="remove_ctg_panel exit-btn pull-right">
                    <span class="glyphicon glyphicon-remove">  </span>
                  </a>
                  <a href="#" accesskey="<?= $counter?>" class="pull-right" id="addButton2"> 
                    <span class="glyphicon glyphicon-plus"></span> Ajouter une partie
                  </a>
                </div>
              </h4>
            </div>
            <?php
             $counter++; 
             if($lot->has('parties')){
              $nbpartie = 0;
             foreach($lot->parties as $partie) {?>
            <div class="col-sm-12" style="margin-bottom: 0;">
              <div class="panel no-border panel-default" id="panel<?= $counter?>">
                <div class="panel-heading" role="tab" id="heading<?= $counter?>">
                  <h4 class="panel-title">
                    <div class="col-sm-1 no-padding hidden">
                      <input class="col-sm-1 form-control " name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][id]" value="<?=$partie->id?>" type="text">
                    </div>
                    <div class="col-sm-1 no-padding">
                      <input placeholder="N° de la partie" class="col-sm-1 form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][numero]" value="<?=$partie->numero?>" type="text">
                    </div>
                    <div class="col-sm-11 no-padding">
                      <input placeholder="intitulé de la partie" class="Partie col-sm-11 form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][libelle]" type="text" value="<?=$partie->libelle?>">
                    </div>
                    <div class="actions_div" style="position: relative; top: -26px;">
                      <a href="#" accesskey="<?= $counter?>" class="remove_ctg_panel exit-btn pull-right">
                        <span class="glyphicon glyphicon-remove">  </span>
                      </a>
                      <a href="#" accesskey="<?= $counter?>" class="pull-right" id="addButton3"> 
                        <span class="glyphicon glyphicon-plus"></span> Ajouter un article
                      </a>
                    </div>
                  </h4>
                </div>
                <?php
                 $counter++; 
                 if($partie->has('articles')){
                  $nbarticle = 0;
                 foreach($partie->articles as $article) {?>
                    <div class="col-sm-12">
                      <div class="panel no-border panel-default" id="panel<?= $counter?>"> 
                        <div class="panel-heading" role="tab" id="heading<?= $counter?>">
                          <h4 class="panel-title">
                            <div class="col-sm-1 no-padding hidden">
                              <input class="form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][Articles][{<?= $nbarticle?>}][id]" value="<?=$article->id?>" type="text">
                            </div>
                            <div class="col-sm-1 no-padding">
                              <input placeholder="N° de l'article" class="form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][Articles][{<?= $nbarticle?>}][numero]" value="<?=$article->numero?>" type="text">
                            </div>
                            <div class="col-sm-3 no-padding">
                              <input placeholder="intitulé de l'article " class="Article form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][Articles][{<?= $nbarticle?>}][libelle]" value="<?=$article->libelle?>" type="text">
                            </div>
                            <div class="col-sm-2 no-padding">
                              <input placeholder="Qte" class="form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][Articles][{<?= $nbarticle?>}][qte]" type="text" value="<?=$article->has('details_article')? end($article->details_article)->qte : ''?>">
                            </div>
                            <div class="col-sm-2 no-padding">
                              <?= $this->form->input('unite_id', ['label'=>false, 'options'=>$unites, 'empty'=>true, 'class'=>' form-control', 'value'=> $article->has('details_article') ? end($article->details_article)->unite->id : '', 'name'=>'Lots[{'.h($nblots).'}][Parties][{'.h($nbpartie).'}][Articles][{'.h($nbarticle).'}][unite_id]', 'value'=>$article->has('details_article')? end($article->details_article)->unite_id : '']); ?>
                            </div>
                            <div class="col-sm-1 no-padding">
                              <input placeholder="Prix unitaire" class="form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][Articles][{<?= $nbarticle?>}][prix]" type="text" value="<?=$article->has('details_article')? end($article->details_article)->prix : ''?>">
                            </div>
                            <div class="col-sm-3 no-padding">
                              <input placeholder="Total" class="form-control" name="Lots[{<?= $nblots?>}][Parties][{<?= $nbpartie?>}][Articles][{<?= $nbarticle?>}][total]" type="text" value="<?=$article->has('details_article')? end($article->details_article)->prix*end($article->details_article)->qte : ''?>">
                            </div>
                            <div class="actions_div" style="position: relative; top: -26px;">
                              <a href="#" accesskey="<?= $counter?>" class="remove_ctg_panel exit-btn pull-right">
                                <span class="glyphicon glyphicon-remove">  </span>
                              </a>
                            </div>
                          </h4>
                        </div>
                      </div>
                    </div>
                    <?php $counter++; $nbarticle++;}}?>
                  </div>
                </div>
                <?php $nbpartie++;}}?>
            </div>
          </div>
          <?php $nblots++;}}?>
        </div>
          <div class="col-md-12 text-center" style="margin-top:15px;">
            <button class="btn btn-success" type= "button" id="addButton" value=""><span class="glyphicon glyphicon-plus"></span> Ajouter un lot</button>
          </div>
        </div>
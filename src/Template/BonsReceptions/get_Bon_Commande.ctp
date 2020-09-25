
<h3> Liste des produits</h3>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="">
        <div class="box-body">
          <table class="table table-hover" id="achats-table">
            <thead>
              <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Qte</th>
                <th>Unité</th>
                <th>Prix</th>
                <th>Total</th>
                <th>Dépot</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($bonsCommande->has('details_bon_commande')) :?>
                <?php for ($key = 0; $key < count($bonsCommande->details_bon_commande); $key++) { 
                    $bonCommandedetails = $bonsCommande->details_bon_commande[$key];
                ?>
                    <tr>
                        <td class="hidden">
                        <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][id]', ['label'=>false, 'value'=>isset($bonCommandedetails) && $bonCommandedetails->has('produit') ? $bonCommandedetails->produit->id :'', 'empty' => true, 'palceholder'=>'Code']);?>
                        </td>
                        <td class="hidden">
                        <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][id_details]', ['label'=>false, 'value'=>isset($bonCommandedetails) ? $bonCommandedetails->id :'', 'empty' => true, 'palceholder'=>'Code']);?>
                        </td>
                        <td class="col-sm-1">
                        <?= isset($bonCommandedetails) && $bonCommandedetails->has('produit')? $bonCommandedetails->produit->code :'';?>
                        </td>
                        <td class="col-sm-2">
                        <?= isset($bonCommandedetails) && $bonCommandedetails->has('produit') ? $bonCommandedetails->produit->nom :'';?>
                        </td class="col-sm-2">
                        <td>
                            <?= isset($bonCommandedetails) && $bonCommandedetails->has('produit')? $bonCommandedetails->produit->types_produit->libelle :'';?>
                        </td>
                        <td class="col-sm-1">
                            <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][qte]', ['class'=>'qte', 'label'=>false, 'value'=>isset($bonCommandedetails)? $bonCommandedetails->qte : '1']);?>
                        </td>
                        <td class="col-sm-1">
                            <?= isset($bonCommandedetails) && $bonCommandedetails->has('produit')? $bonCommandedetails->produit->unite->signe :'';?>
                        </td>
                        <td class="col-sm-1">
                            <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][prix]', ['class'=>'qte', 'label'=>false, 'value'=>isset($bonCommandedetails)? $bonCommandedetails->prixachat : '0']);?>    
                        </td>
                        <td class="col-sm-1">
                            <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][total]', ['class'=>'total', 'label'=>false, 'value'=>isset($bonCommandedetails)? $bonCommandedetails->prixachat * $bonCommandedetails->qte : '0']);?>    
                        </td>
                        <td class="col-sm-1">
                            <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][depot_id]', ['label'=>false, 'class'=>'depot', 'empty'=>true,  'options'=>$depots]);?>
                        </td>
                        <td class="col-sm-1">
                            <?php echo $this->Form->button(__('+'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#depotPopup']) ?>
                        </td>
                    </tr>
                <?php }?>
              <?php endif;?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

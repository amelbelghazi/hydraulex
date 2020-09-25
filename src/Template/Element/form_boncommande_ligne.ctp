<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td class="hidden">
    <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][id]', ['label'=>false, 'value'=>isset($bonCommandedetails) && $bonCommandedetails->has('produit') ? $bonCommandedetails->produit->id :'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="hidden">
    <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][id_details]', ['label'=>false, 'value'=>isset($bonCommandedetails) ? $bonCommandedetails->id :'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-1">
    <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][code]', ['label'=>false, 'value'=>isset($bonCommandedetails) && $bonCommandedetails->has('produit')? $bonCommandedetails->produit->code :'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-2">
    <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][nom]', ['label'=>false, 'value'=>isset($bonCommandedetails) && $bonCommandedetails->has('produit') ? $bonCommandedetails->produit->nom :'', 'empty' => true, 'palceholder'=>'Nom']);?>
    </td class="col-sm-2">
    <td>
        <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][types_produit_id]', ['label'=>false, 'empty'=>true, 'options'=>$typesProduits, 'value'=> isset($bonCommandedetails) && $bonCommandedetails->has('produit')? $bonCommandedetails->produit->types_produit->id :'']);?>
    </td>

    <td class="col-sm-1">
        <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][qte]', ['class'=>'qte', 'label'=>false, 'value'=>isset($bonCommandedetails)? $bonCommandedetails->qte : '1']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][unite_id]', ['label'=>false, 'empty'=>true, 'options'=>$unites, 'value'=>isset($bonCommandedetails) && $bonCommandedetails->has('produit')? $bonCommandedetails->produit->unite->id :'']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][prix]', ['class'=>'montant', 'label'=>false, 'value'=>isset($bonCommandedetails)? $bonCommandedetails->prixachat : '0']);?>    
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('BonCommandeDetails[{'.$key.'}][total]', ['class'=>'total', 'label'=>false, 'value'=>isset($bonCommandedetails)? $bonCommandedetails->prixachat * $bonCommandedetails->qte : '0']);?>    
    </td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-flat" >Supprimer</a>
    </td>
</tr>
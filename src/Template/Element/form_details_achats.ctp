<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td class="hidden">
    <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.id', ['label'=>false, 'value' => isset($produit) ? $produit->code:'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-2">
    <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.code', ['label'=>false, 'value' => isset($produit) ? $produit->code:'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-2">
    <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.nom', ['label'=>false, 'value' => isset($produit) ? $produit->nom:'', 'empty' => true, 'palceholder'=>'Nom']);?>
    </td class="col-sm-2">
    <td>
        <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.type_produit_id', ['label'=>false, 'empty'=>true, 'options'=>$typesProduits, 'value'=> isset($produit) ? $produit->has('types_produits')? $produit->types_produits->id :'' :'']);?>
    </td>
    <td class="hidden">
        <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.categorie_produit_id', ['label'=>false, 'empty'=>true, 'options'=>$categoriesProduits, 'value'=>isset($produit) ? $produit->has('categories_produits')? $produit->categories_produits->id : '' :'']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.qte', ['class'=>'qte', 'label'=>false, 'value'=>'1']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.unite_id', ['label'=>false, 'empty'=>true, 'options'=>$unites, 'value'=>isset($produit) && $produit->has('unites')? $produit->unites->id :'']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.montant', ['class'=>'montant', 'label'=>false, 'palceholder'=>'prix']);?>    
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails.{'.$key.'}.depot_id', ['label'=>false, 'empty'=>true,  'options'=>$depots]);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->button(__('+'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#fournisseurPopup']) ?>
    </td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-flat" >Supprimer</a>
    </td>
</tr>
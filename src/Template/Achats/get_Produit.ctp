<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td class="hidden">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][id]', ['label'=>false, 'value' => isset($produit) ? $produit->id:'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="hidden">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][id_details]', ['label'=>false, 'value'=>'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-1">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][code]', ['label'=>false, 'value' => isset($produit) ? $produit->code:'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-2">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][nom]', ['label'=>false, 'value' => isset($produit) ? $produit->nom:'', 'empty' => true, 'palceholder'=>'Nom']);?>
    </td class="col-sm-2">
    <td>
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][types_produit_id]', ['label'=>false, 'empty'=>true, 'options'=>$typesProduits, 'value'=> isset($produit)? $produit->types_produit_id :'']);?>
    </td>

    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][qte]', ['class'=>'qte', 'label'=>false, 'value'=>'1']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][unite_id]', ['label'=>false, 'empty'=>true, 'options'=>$unites, 'value'=>isset($produit)? $produit->unite_id :'']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][prix]', ['class'=>'montant', 'label'=>false, 'value'=>'0']);?>    
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][total]', ['class'=>'total', 'label'=>false, 'value'=>'0']);?>    
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][depot_id]', ['label'=>false, 'class'=>'depot', 'empty'=>true,  'options'=>$depots]);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->button(__('+'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#depotPopup']) ?>
    </td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-flat" >Supprimer</a>
    </td>
</tr>
<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td class="hidden">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][id]', ['label'=>false, 'value'=>isset($achatsdetails) && $achatsdetails->has('stocks') && end($achatsdetails->stocks)->has('produit')? end($achatsdetails->stocks)->produit->id :'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="hidden">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][id_details]', ['label'=>false, 'value'=>isset($achatsdetails) && $achatsdetails->has('stocks') && end($achatsdetails->stocks)->has('produit')? $achatsdetails->id :'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-1">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][code]', ['label'=>false, 'value'=>isset($achatsdetails) && $achatsdetails->has('stocks') && end($achatsdetails->stocks)->has('produit')? end($achatsdetails->stocks)->produit->code :'', 'empty' => true, 'palceholder'=>'Code', 'required']);?>
    </td>
    <td class="col-sm-2">
    <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][nom]', ['label'=>false, 'value'=>isset($achatsdetails) && $achatsdetails->has('stocks') && end($achatsdetails->stocks)->has('produit')? end($achatsdetails->stocks)->produit->nom :'', 'empty' => true, 'palceholder'=>'Nom', 'required']);?>
    </td class="col-sm-2">
    <td>
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][types_produit_id]', ['label'=>false, 'empty'=>true, 'options'=>$typesProduits, 'value'=> isset($achatsdetails) && end($achatsdetails->stocks)->has('produit')? end($achatsdetails->stocks)->produit->types_produit->id :'', 'required']);?>
    </td>

    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][qte]', ['class'=>'qte', 'label'=>false, 'value'=>isset($achatsdetails)? $achatsdetails->qte : '1', 'required']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][unite_id]', ['label'=>false, 'empty'=>true, 'options'=>$unites, 'value'=>isset($achatsdetails) && $achatsdetails->has('stocks') && end($achatsdetails->stocks)->has('produit')? end($achatsdetails->stocks)->produit->unite->id :'', 'required']);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][prix]', ['class'=>'montant', 'label'=>false, 'value'=>isset($achatsdetails)? $achatsdetails->prix : '0', 'required']);?>    
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][total]', ['class'=>'total', 'label'=>false, 'value'=>isset($achatsdetails)? $achatsdetails->prix * $achatsdetails->qte : '0']);?>    
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->input('AchatsDetails[{'.$key.'}][depot_id]', ['required' => "required", 'label'=>false, 'class'=>'depot', 'empty'=>true,  'options'=>$depots, 'value'=>isset($achatsdetails) && $achatsdetails->has('stocks')? end($achatsdetails->stocks)->depot_id   : null]);?>
    </td>
    <td class="col-sm-1">
        <?php echo $this->Form->button(__('+'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#depotPopup']) ?>
    </td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-flat" >Supprimer</a>
    </td>
</tr>
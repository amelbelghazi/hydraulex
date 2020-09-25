<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td class="hidden">
    <?php echo $this->Form->input('DetailsLocations.{'.$key.'}.id_details', ['label'=>false, 'value'=>isset($detailslocations)? $detailslocations->id :'', 'empty' => true, 'palceholder'=>'Code']);?>
    </td>
    <td class="col-sm-2">
    <?php echo $this->Form->input('DetailsLocations.{'.$key.'}.code', ['label'=>false, 'value' => isset($detailslocations) ? end($detailslocations->ressources)->code :'', 'empty' => true]);?>
    </td>
    <td class="col-sm-3"><?php echo $this->Form->input('DetailsLocations.{'.$key.'}.nom', ['label'=>false, 'value' => isset($detailslocations) ? end($detailslocations->ressources)->nom:'']);?></td>
    <td class="col-sm-1"><?php echo $this->Form->input('DetailsLocations.{'.$key.'}.duree', ['label'=>false, 'value' => isset($detailslocations) ? $detailslocations->duree:'']);?></td>
    <td class="col-sm-2"><?php echo $this->Form->input('DetailsLocations.{'.$key.'}.prix', ['label'=>false, 'class'=>'montant', 'value' => isset($detailslocations) ? $detailslocations->prix:'']);?></td>
    <td class="col-sm-3"><?php echo $this->Form->input('DetailsLocations.{'.$key.'}.parc_id', ['options'=> $parcs, 'label'=>false, 'value' => isset($detailslocations) ? end(end($detailslocations->ressources)->parcs_ressources)->parc_id: null]);?></td>
    <td class="actions col-sm-1">
        <a href="#" class="remove btn btn-danger btn-xs" >Supprimer</a>
    </td>
</tr>

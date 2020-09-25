<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
    <?php echo $this->Form->input('DetailsFraisProjets.{'.$key.'}.types_frais_id', ['label'=>false, 'options' => $typesFrais, 'value' => isset($detailsfraisprojet) ? $detailsfraisprojet->types_frais_id:'', 'empty' => true, 'class'=>'updatable']);?>
    </td>
    <td>
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-xs', 'data-target'=>'#TypeFraisPopup']) ?>
    </td>
    <td><?php echo $this->Form->input('DetailsFraisProjets.{'.$key.'}.montant', ['class'=>'montant', 'label'=>false, 'value' => isset($detailsfraisprojet) ? $detailsfraisprojet->montant:'']);?></td>
    <td><?php echo $this->Form->input('DetailsFraisProjets.{'.$key.'}.observation', ['label'=>false, 'value' => isset($detailsfraisprojet) ? $detailsfraisprojet->observation:'']);?></td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-xs" >Supprimer</a>
    </td>
</tr>

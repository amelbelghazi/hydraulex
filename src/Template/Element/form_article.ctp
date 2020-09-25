<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td class="col-xs-1">
    <?php echo $this->Form->input('Articles.{'.$key.'}.Numero', ['label'=>false, 'class'=>'updatable']);?>
    </td>
    <td class="col-xs-3">
        <?php echo $this->Form->input('Articles.{'.$key.'}.intitule', ['label'=>false]);?></td>
    </td>
    <td>
         <?php echo $this->Form->input('Articles.{'.$key.'}.Qte', ['label'=>false]);?></td>
    </td>
    <td>
         <?php echo $this->Form->input('Articles.{'.$key.'}.unite_id', ['label'=>false]);?></td>
    </td>
    <td>
         <?php echo $this->Form->input('Articles.{'.$key.'}.prixunitaire', ['label'=>false]);?></td>
    </td>
    <td>
         <?php echo $this->Form->input('Articles.{'.$key.'}.Total', ['label'=>false]);?></td>
    </td>
    <td>
        
    </td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-xs" >Supprimer</a>
    </td>
</tr>
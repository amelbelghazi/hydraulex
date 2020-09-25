<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td>
    </td>
    <td>
    <?php echo $this->Form->input('Parties.{'.$key.'}.Numero', ['label'=>false, 'class'=>'updatable']);?>
    </td>
    <td>
        <?php echo $this->Form->input('Parties.{'.$key.'}.intitule', ['label'=>false]);?>
    </td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-xs" >Supprimer</a>
    </td>
</tr>



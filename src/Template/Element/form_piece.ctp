<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
    <td> </td> 
    <td class="hidden"> 
        <?php echo $this->Form->input('Pieces.{'.$key.'}.id', ['label'=>false, 'value' => isset($piece) ? $piece->id:'', 'empty' => true, 'class'=>'updatable']);?>
    </td>       
    <td>
    <?php echo $this->Form->input('Pieces.{'.$key.'}.ref', ['label'=>false, 'value' => isset($piece) ? $piece->ref:'', 'empty' => true, 'class'=>'updatable']);?>
    </td>
    <td>
    <?php echo $this->Form->input('Pieces.{'.$key.'}.description', ['label'=>false, 'value' => isset($piece) ? $piece->description:'', 'empty' => true, 'class'=>'updatable']);?>
    </td>
    <td class="actions">
        <a href="#" class="remove btn btn-danger btn-xs" >Supprimer</a>
    </td>
</tr>
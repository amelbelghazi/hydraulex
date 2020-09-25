<?php
$key = isset($key) ? $key : '<%= key %>';
?>
<tr>
	<td class="col-sm-3"> <?php echo $this->Form->input('Entretiens.{'.$key.'}.libelle', ['label'=>false]);?> </td>
	<td class="col-sm-2"> <?php echo $this->Form->input('Entretiens.{'.$key.'}.cout', ['label'=>false]);?> </td>
	<td class="col-sm-1">DA</td>
	<td class="col-sm-2"> <?php echo $this->Form->input('Entretiens.{'.$key.'}.duree', ['label'=>false]);?> </td>
	<td class="col-sm-1">jrs</td>
	<td class="col-sm-2"> <?php echo $this->Form->input('Entretiens.{'.$key.'}.periode_id', ['label'=>false, 'options' => $periodes, 'empty' => true]);?> </td>
    <td class="actions col-sm-1"> <a href="#" class="remove btn btn-danger btn-xs" >Supprimer</a> </td>
</tr>

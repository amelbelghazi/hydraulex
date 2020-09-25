*url:'<?php echo Router::url(array('controller' => 'MaitresOuvrages', 'action' => 'add'));?>',


$.ajaxSetup({headers: { 'X-Requested-With': 'XMLHttpRequest' }})

$(function(){$('#myForm').ajaxForm(function(){alert("Thank you for your comment!");});});
$(function(){$('#formMaitreOuvrage').ajaxForm(function(){alert("Thank you for your comment!");});});

$(document).on("submit","#formMaitreOuvrage",function(e){
	var data=$(this).serialize();
	$.ajax({type:"POST",url:'<?php echo Router::url(['controller' => 'MaitresOuvrages', 'action' => 'add']);?>',
		data:data,
		success: function(response){
			console.log(reponse);
			$('#MaitreOuvragePopup').modal('hide');
		},error:function(x,e) 
		{if (x.status==0) {
			alert('You are offline!!\n Please Check Your Network.');} 
			else if(x.status==404) {alert('Requested URL not found.');} 
			else if(x.status==500) {alert('Internel Server Error.');} 
			else if(e=='parsererror') {alert('Error.\nParsing JSON Request failed.');} 
			else if(e=='timeout'){alert('Request Time out.')}
			else {alert('Unknow Error.\n'+x.responseText)}}
		});
});


<dl class="dl-horizontal">
                    <dt><?= __('Intitulé') ?></dt>
                    <dd>
                        <?= h($affaire->intitule) ?>
                    </dd>
                    <dt><?= __('Catégorie') ?></dt>
                    <dd>
                        <?= $affaire->has('categories_affaire') ? $affaire->categories_affaire->libelle : '' ?>
                    </dd>
                    <dt><?= __('Maitres Ouvrage') ?></dt>
                    <dd>
                        <?= $affaire->has('maitres_ouvrage') ? $affaire->maitres_ouvrage->nom : '' ?>
                    </dd>
                         <dt><?= __('Wilaya') ?></dt>
                    <dd>
                        <?= $affaire->has('wilaya') ? $affaire->wilaya->id : '' ?>
                    </dd>                                                                   
                </dl>
/////Suppression en cascade
[
    'dependent' => true,
    'cascadeCallbacks' => true,
]

<tr>
  <td>
    <?php echo $this->Form->input('FraisProjets.1.types_frais_id', ['label'=>false, 'name' =>'FraisProjets.1.types_frais_id', 'options' => $typesFrais, 'empty' => true]);?>
  </td>
  <td>
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-xs', 'data-target'=>'#TypeFraisPopup']) ?>
  </td>
  <td><?php echo $this->Form->input('FraisProjets.1.montant', ['type'=>'number', 'label'=>false, 'class' =>'form-control', 'name' =>'FraisProjets.1.montant', 'class' => 'form-control']);?></td>
  <td><?php echo $this->Form->input('FraisProjets.1.observation', ['label'=>false, 'class' =>'form-control', 'name' =>'FraisProjets.1.observation', 'class' => 'form-control']);?></td>
  <td class="actions" style="white-space:nowrap">
    <?= $this->Form->button('+', ['type'=>'button', 'class'=>'btn btn-info btn-xs']) ?>
    <?= $this->Form->button('-', ['type'=>'button', 'class'=>'btn btn-danger btn-xs']) ?>
  </td>
</tr>
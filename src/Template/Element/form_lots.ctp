<tr>
	<td>
		<?php echo $this->Form->input('Lots.{'.$key.'}.Numero', ['label'=>false, 'class'=>'updatable']);?>
	</td>
	<td>
		<?php echo $this->Form->input('Lots.{'.$key.'}.intitule', ['label'=>false]);?> 
	</td>
	<td><a href="#" class="remove btn btn-danger btn-xs" >Supprimer</a></td>
</tr>

'<div class="col-sm-12" style="margin-bottom: 0;">'+
	'<div class="panel panel-default" id="panel'+ counter +'">' + 
        '<div class="panel-heading" role="tab" id="heading'+ counter +'">'+
         	'<h4 class="panel-title">' +
	           '<a> <?php echo $this->Form->input("Lots.{'.counter.'}.intitule", ["label"=>false, "value"=>"+catgName+"]);?>'+ 
	       		'</a>'+
		   		'<div class="actions_div" style="position: relative; top: -26px;">' +
			       '<a href="#" accesskey="'+ counter +'" class="remove_ctg_panel exit-btn pull-right">'+
				       	'<span class="glyphicon glyphicon-remove"> 	</span>'+
			       '</a>'+ 
			        '<a href="#" accesskey="'+ counter +'" class="pull-right" id="addButton2"> '+
			        	'<span class="glyphicon glyphicon-plus"></span> Ajouter une partie</a></div>'+
    		'</h4></div></div></div>'

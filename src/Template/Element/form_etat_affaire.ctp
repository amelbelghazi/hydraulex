<div class="form-group has-feedback extraspace">
  <label for="affaire_id" class="col-sm-2 control-label ">Affaire</label>
  <div class="col-sm-10">
  	<?php echo $this->Form->input('affaire_id', ['label'=>false]);?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="etat_id" class="col-sm-2 control-label ">Etat </label>
  <div class="col-sm-9">
  	<?php echo $this->Form->input('etat_id', ['label'=>false, 'options' => $etats, 'empty' => true]);?>
  </div>
  <div class="col-sm-1"> 
    <?= $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#EtatPopup']) ?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="cause" class="col-sm-2 control-label ">Cause </label>
  <div class="col-sm-10">
  	<?php echo $this->Form->input('cause', ['label'=>false]);?>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	 <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?> 
    </div>
  </div>
</div>
<div class="box-body">
	<div class="form-group has-feedback extraspace">
		<label for="libelle" class="col-sm-2 control-label ">Libellé </label>
		<div class="col-sm-10">
		  <?php echo $this->Form->input('libelle', ['label'=>false]);?>
		</div>
	</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
   		<?php echo $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?> 
    </div>
  </div>
</div>
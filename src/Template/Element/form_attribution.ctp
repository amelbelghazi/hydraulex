<div class="box-body">
	<div class="form-group has-feedback extraspace">
	  <label for="affaire_id" class="col-sm-2 control-label ">Affaire</label>
	  <div class="col-sm-10">
	    <?php echo $this->Form->input('affaire_id', ['id'=> 'affaire', 'label'=>false, 'options' => $affaires, 'empty' => true]);?>
	  </div>
	</div>
	<div class="form-group has-feedback extraspace">
	  <label for="soumissionnaire_id" class="col-sm-2 control-label ">Soumissionnaire</label>
	  <div class="col-sm-10">
	  	<div>
	  		<?php echo $this->Form->input('soumissionnaire_id', ['type' => 'select', 'label'=>false, 'id' => 'soumissionnaire-name','empty' => true]);?>
		</div>
	  </div>
	</div>
	<div class="form-group has-feedback extraspace">
	  <label for="observation" class="col-sm-2 control-label ">Observation</label>
	  <div class="col-sm-10">
	    <?php echo $this->Form->input('observation', ['label'=>false, 'rows'=>2]);?>
	  </div>
	</div>
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>


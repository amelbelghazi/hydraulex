<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Type </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('types_fonction_id', ['label'=>false, 'options'=>['', 'Administration', 'Chantier'], 'value'=>!isset($fonction)? 0 : !$fonction->has('fonctions_administratives') ? $fonction->has('fonctions_chantier') ? 2 : 0 : 1 ]);  ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Nom </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('nom', ['label'=>false]);  ?>
    </div>
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
<div class="box-body">
  <div class="form-group has-feedback">
    <label class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('nom', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2 control-label">Code</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('code', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2 control-label">Unité</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('unite_id', ['label'=>false, 'options' => $unites, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2 control-label">Alert</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('qtealert', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('types_produit_id', ['label'=>false,'options' => $typesProduits, 'empty' => true]);?>
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
<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label for="marche_id" class="col-sm-2 control-label ">Intitulé</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('marche_id', ['label'=>false, 'options' => $marches, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="datedetails" class="col-sm-2 control-label ">Le </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datedetails', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text', 'label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="avenant_id" class="col-sm-2 control-label ">Le </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('avenant_id', ['options' => $avenants, 'empty' => true, 'label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="avenant_id" class="col-sm-2 control-label ">Avenant N° </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('avenant_id', ['options' => $avenants, 'empty' => true, 'label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="intitule" class="col-sm-2 control-label ">Intitulé </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('intitule', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="montant" class="col-sm-2 control-label ">Montant </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('montant', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="delai" class="col-sm-2 control-label ">Délai </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('delai', ['label'=>false]);?>
    </div>
  </div>
</div>
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>
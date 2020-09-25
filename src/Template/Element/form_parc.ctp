<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Libellé </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('libelle', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Adresse </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('adresse', ['label'=>false, 'rows'=>2]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Wilaya </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('wilaya_id', ['label'=>false, 'options' => $wilayas, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Responsable </label>
    <div class="col-sm-10">  
      <?php echo $this->Form->input('responsables', ['label'=>false, 'data-placeholder'=>'Selectionner un ou plusieurs responsable(s)' , 'style'=>'width: 100%;', 'multiple'=>'multiple', 'class'=>'select2', 'options' => $personnes, 'value'=>isset($responsablestab)? $responsablestab : [], 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Gardien </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('gardiens', ['label'=>false, 'style'=>'width: 100%;', 'data-placeholder'=>'Selectionner un ou plusieurs gardien(s)' ,'multiple'=>'multiple', 'class'=>'select2', 'options' => $personnes, 'value'=>isset($gardienstab) ? $gardienstab: [], 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Date début d'exploitation </label>
    <div class="col-sm-5">
      <?php echo $this->Form->input('dateexploitation', ['label'=>false, 'class' => 'datepicker form-control', 'type' => 'text', 'empty' => true]);?>
    </div>
    <label class="col-sm-1 control-label ">Délai</label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('delai', ['label'=>false]);?>
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
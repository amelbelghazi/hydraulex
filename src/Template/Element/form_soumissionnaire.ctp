<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label for="nom" class="col-sm-2 control-label ">Nom </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('nom', ['label'=>false,'required'=>'required']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="qualification.libelle" class="col-sm-2 control-label ">Qualification </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('qualifications.libelle', ['label'=>false,'required'=>'required']);?>
    </div>
  </div>
    <div class="form-group has-feedback extraspace">
    <label for="qualification.libelle" class="col-sm-2 control-label ">Wilaya </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('wilaya_id', ['label'=>false, 'empty'=>true, 'options'=>$wilayas,'required'=>'required']);?>
    </div>
  </div>
</div>
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
   <?php echo $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?> 
    </div>
  </div>
</div>
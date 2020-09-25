<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label for="affaire_id" class="col-sm-2 control-label ">Affaire</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('affaire_id', ['options' => $affaires, 'empty' => true, 'label'=>false,'required'=>'required']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="soumissionnaire_id" class="col-sm-2 control-label ">Soumissionnaire</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('soumissionnaire_id', ['options' => $soumissionnaires, 'empty' => true, 'label'=>false,'required'=>'required']);?>
    </div>
    <div class="col-sm-1"> 
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#SoumissionnairePopup']) ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="delais" class="col-sm-2 control-label ">Délais proposé</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('delais', ['label'=>false,'required'=>'required']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="montant" class="col-sm-2 control-label ">Montant proposé</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('montant', ['label'=>false,'required'=>'required']);?>
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
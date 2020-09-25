<div class="box-body">
<?php
  echo $this->Form->input('');
  echo $this->Form->input('');
?>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Libelle</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('libelle', ['label'=>false, 'placeholder'=>'Saisissez le nom complet de l\'unité']);?>
    </div> 
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Signe</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('signe', ['label'=>false, 'placeholder'=>'Saisissez le signe de l\'unité']);?>
    </div> 
  </div>
</div>
<div class="box-footer" style="    border-top: none;">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>
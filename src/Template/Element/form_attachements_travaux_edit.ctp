<div class="box-body">
<?php
?>
<div class="form-group has-feedback extraspace ">
  <label class="col-sm-2 control-label ">Devis</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('devi_id', ['label'=>false, 'id'=>'devis', 'disabled']);?>
  </div> 
</div>
<div class="form-group has-feedback extraspace">
  <label  class="col-sm-2 control-label ">Initutlé</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('intitule', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Saisissez l\'intitulé de l\'attachement']);?>
  </div> 
</div>
<div class="form-group has-feedback extraspace">
  <label  class="col-sm-2 control-label ">Date</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('dateattachement', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
  </div> 
</div>
<div id="devisContainer">
  <?= $this->element('form_devis_attachement');?>
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
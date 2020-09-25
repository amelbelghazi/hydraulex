<div class="box-body">
  <div class="form-group has-feedback">
    <label for="marche_id" class="col-sm-2 control-label">Marché</label>
    <div class="col-sm-10">
      <?php
        echo $this->Form->input('details_marche_id', ['label'=>false, 'options' => $detailsMarches, 'empty' => true, 'id'=> 'devis']);
      ?>
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
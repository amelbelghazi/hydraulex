
<div class="form-group has-feedback extraspace hidden">
  <label for="avance_id" class="col-sm-3 control-label ">avance id</label>
  <div class="col-sm-9">
     <?php echo $this->Form->input('avance_id', ['type'=>'text','id'=>'avance_id','label'=>false, 'class' => 'form-control']);?>
  </div> 
</div>
<div class="form-group has-feedback extraspace">
  <label for="montant" class="col-sm-3 control-label ">montant</label>
  <div class="col-sm-9">
     <?php echo $this->Form->input('montant', ['label'=>false,'empty' => true, 'class' => 'form-control']);?>
  </div> 
</div> 
<div class="form-group has-feedback extraspace">
  <label for="intitule" class="col-sm-3 control-label ">dateremboursement</label>
  <div class="col-sm-9">
     <?php echo $this->Form->input('dateremboursement', ['label'=>false,'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
  </div>
</div> 
<div class="box-footer" style="    border-top: none;">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Ajouter'), ['class' => 'btn btn-danger btn-flat']) ?>
    </div>
  </div>
</div>


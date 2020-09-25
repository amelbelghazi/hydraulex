
<div class="form-group has-feedback extraspace hidden ">
  <label for="caution_id" class="col-sm-3 control-label ">caution id</label>
  <div class="col-sm-9">
     <?php echo $this->Form->input('caution_id', ['type'=>'text','id'=>'caution_id','label'=>false, 'class' => 'form-control']);?>
  </div>  
</div>
<div class="form-group has-feedback extraspace">
  <label for="montant" class="col-sm-3 control-label ">montant</label>
  <div class="col-sm-9">
     <?php echo $this->Form->input('montant', ['label'=>false,'empty' => true, 'class' => 'form-control']);?>
  </div> 
</div>
<div class="form-group has-feedback extraspace">
  <label for="dateremboursement" class="col-sm-3 control-label ">dateremboursement</label>
  <div class="col-sm-9">
     <?php echo $this->Form->input('dateremboursement', ['label'=>false,'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="observation" class="col-sm-3 control-label ">Observation</label>
  <div class="col-sm-9">
     <?php echo $this->Form->input('observation', ['label'=>false,'empty' => true, 'default' => '', 'class' => 'form-control', 'type' => 'text']);?>
  </div>
</div> 
<div class="box-footer" style="    border-top: none;">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Ajouter'), ['class' => 'btn btn-danger btn-flat']) ?>
    </div>
  </div>
</div>


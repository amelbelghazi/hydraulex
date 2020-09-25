<div class="box-body">
  <div class="form-group has-feedback">
    <label for="total" class="col-sm-2 control-label">Personnel</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('personne_id', ['label'=>false, 'options' => $personnes, 'empty' => true, 'label'=>false, 'value'=>isset($salaire) && $salaire->has('personnel') && $salaire->personnel->has('personne')? $salaire->personnel->personne->id : '']);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label for="total" class="col-sm-2 control-label">Date</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datesalaire', ['label'=>false, 'empty', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label for="total" class="col-sm-2 control-label">Montant</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('montant', ['label'=>false, 'enabled'=>false]);?>
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
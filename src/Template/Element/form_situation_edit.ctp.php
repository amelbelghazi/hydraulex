<div class="box-body">
  <div class="form-group has-feedback">
    <label for="marche_id" class="col-sm-2 control-label">Marché</label>
    <div class="col-sm-10">
      <?php
        !$situation->has('attachements_travaux') ? '' : end($situation->attachements_travaux->devis->marche)->details_marches->intitule;
      ?>
    </div>
  </div>
  <div class=" has-feedback col-sm-12 no-padding">
    <label class="col-sm-2 ">Attachement</label>
    <div class="col-sm-7">
      <?php 
        $situation->has('attachements_travaux') ? h($situation->attachements_travaux->intitule);
      ?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2 ">Date</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datesituation', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2  ">Total</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('total', ['label'=>false, 'id'=>'totlaSituation']);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2  ">Observation</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('observation', ['label'=>false, 'rows'=>2]);?>
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

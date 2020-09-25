<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2">Marché</label>
    <div class="col-sm-10">
      <?=
        $situation->has('attachements_travaux') ? 
          $situation->attachements_travaux->has('devi') ? 
            $situation->attachements_travaux->devi->has('marche') ? 
              $situation->attachements_travaux->devi->marche->has('details_marches') ? 
                end($situation->attachements_travaux->devi->marche->details_marches)->intitule : '' : '' : '' : '';
      ?>
    </div>
  </div>
  <div class=" has-feedback form-group extraspace">
    <label class="col-sm-2 ">Attachement</label>
    <div class="col-sm-7">
      <?= 
        $situation->has('attachements_travaux') ? $situation->attachements_travaux->intitule : '';
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

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#panne" data-toggle="tab">Panne</a></li>
    <li><a href="#reparation" data-toggle="tab">Réparation</a></li>
  </ul>
  <div class="tab-content">
    <div class="active tab-pane"  id="panne">
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Ressource</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('ressource_id', ['label'=>false, 'id'=>'ressource_id',  'options' => $ressources]);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Date</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('datepanne', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Cause</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('cause', ['label'=>false]);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Durée</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('duree', ['label'=>false]);?>
        </div>
      </div>
    </div>
    <div class="tab-pane"  id="reparation">
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Garage</label>
        <div class="col-sm-9">
          <?php echo $this->Form->input('Reparations.garage_id', ['label'=>false, 'options' => $garages, 'empty' => true]);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Date réparation</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('Reparations.datereparation', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Coût</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('Reparations.cout', ['label'=>false]);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="nom" class="col-sm-2 control-label ">Durée</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('Reparations.duree', ['label'=>false]);?>
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
    <?= $this->Form->button(__('Valider'), ['type'=>'submit', 'class' => 'btn btn-primary btn-flat']) ?>
      </div>
    </div>
  </div>
</div>
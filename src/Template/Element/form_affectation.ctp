<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-1">Ressource</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('ressource_id', ['label'=>false, 'options' => $ressources, 'empty' => true]);?>
    </div>
    <label class="col-sm-1">Date </label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('dateaffectation', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-1">Marché</label>
      <div class="col-sm-3">
      <?php echo $this->Form->input('details_marche_id', ['label'=>false, 'id'=>'listemarches', 'options'=>$detailsMarches,  'empty'=> true, 'value'=> !empty($affectation) && !empty($affectation->affectations_chantier)? end(end($affectation->affectations_chantier)->chantier->marche->details_marches)->id : '']);?>
    </div>
    <label class="col-sm-1"> Type</label>
    <div class="col-sm-2">
      <select class="form-control" id="typeAffectation" name="type_affectation">
        <option <?= empty($affectation->affectations_administration) && empty($affectation->affectations_chantier) ? "selected='selected'" : ''?> ></option>
        <option value="0" <?= !empty($affectation->affectations_administration) && empty($affectation->affectations_chantier)? "selected='selected'" : ''?> >Administration</option>
        <option value="1" <?= !empty($affectation->affectations_chantier) && empty($affectation->affectations_administration)? "selected='selected'" : ""?> >Chantier</option>
      </select>
    </div>
    <label class="col-sm-2">Chantier/Département</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('location_id', ['label'=>false, 'id'=>'listeaffectation', 'type'=>'select',  'empty'=> true, 'value'=> empty($affectation->affectations_chantier)? !empty($affectation->affectations_administration)? end($affectation->affectations_administration)->departement->id : '' : end($affectation->affectations_chantier)->chantier->id, 'options'=>isset($locations)? $locations : '']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-1"> Personnel</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('personne_id', ['label'=>false, 'id'=>'listepersonnels', 'type'=>'select',  'empty'=> true, 'options'=>isset($personnels) ?  $personnels : '', 'value'=>empty($affectation->affectations_chantier)? !empty($affectation->affectations_administration)? end($affectation->affectations_administration)->personnel->personne->id : '' : end($affectation->affectations_chantier)->personnel->personne->id, 'options'=>isset($personnels)? $personnels : '']);?>
    </div>
    <label class="col-sm-1"> Durée</label>
    <div class="col-sm-2">
      <?php echo $this->Form->input('duree', ['label'=>false]);?>
    </div>
    <label class="col-sm-2">Parc</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('parc_id', ['label'=>false, !empty($affectation->ressource)? '': 'disabled', 'empty' => true, 'type' => 'select', 'id'=>'listeparc', 'options'=>isset($parcs) ? $parcs : '', 'value'=>!empty($affectation->ressource)? end($affectation->ressource->parcs_ressources)->parc_id : '']);?>
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
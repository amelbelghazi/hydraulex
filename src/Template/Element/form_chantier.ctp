<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label for="affaire_id" class="col-sm-2 control-label ">Marché</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('details_marche_id', ['label'=>false, 'options' => $detailsMarches, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="affaire_id" class="col-sm-2 control-label ">Nom</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('nom', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="affaire_id" class="col-sm-2 control-label ">Adresse</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('adresse', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="affaire_id" class="col-sm-2 control-label ">Wilaya</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('wilaya_id', ['label'=>false, 'options' => $wilayas, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="affaire_id" class="col-sm-2 control-label ">Etat</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('types_etats_chantier_id', ['label'=>false, 'options' => $typeEtatsChantiers, 'empty' => true,'value'=>isset($chantier) && $chantier->has('etats_chantiers') ? end($chantier->etats_chantiers)->types_etats_chantier_id: '']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace ">
    <label for="affaire_id" class="col-sm-2 control-label ">Cause</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('cause', ['label'=>false, 'rows'=>2 ,'value'=>isset($chantier) && $chantier->has('etats_chantiers') ? end($chantier->etats_chantiers)->cause: '']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="affaire_id" class="col-sm-2 control-label ">Responsable</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('personne_id', ['label'=>false, 'options' => $personnes, 'empty' => true, 'value'=> isset($chantier) && $chantier->has('responsables') && end($chantier->responsables)->has('personnel') ? end($chantier->responsables)->personnel->personne_id : '']);?>
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
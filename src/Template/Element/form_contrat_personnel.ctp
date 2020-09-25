<div class="box-body">
  <div class="form-group has-feedback extraspace">
  	<label  class="col-sm-1 control-label ">Personnels </label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('Contrats.personne_id', ['label'=>false, 'value'=>isset($contratsPersonnel)? $contratsPersonnel->personnel->personne->id : '', 'empty'=>true, 'options'=>$personnes]);  ?>
    </div>
    <label  class="col-sm-2 control-label ">Numero </label>
    <div class="col-sm-2">
      <?php echo $this->Form->input('Contrats.numero', ['label'=>false, 'value'=>isset($contratsPersonnel) ? $contratsPersonnel->contrat->numero : '']);  ?>
    </div>
    <label  class="col-sm-1 control-label ">Etat </label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('Contrats.types_etats_contrat_id', ['label'=>false, 'empty'=>true, 'options'=>$typesEtatsContrats, 'value'=>isset($contratsPersonnel) ? end($contratsPersonnel->contrat->etats_contrats)->types_etats_contrat->id : '']);  ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-1 control-label ">Type</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('Contrats.type', ['label'=>false, 'id'=>'typecontrat', 'options' => ['CDI', 'CDD'], 'empty' => true, 'value'=>isset($contratsPersonnel) ? $contratsPersonnel->contrat->type : '']);  ?>
    </div>
    <label class="col-sm-2 control-label ">Débute le</label>
    <div class="col-sm-2">
      <?php echo $this->Form->input('Contrats.dateetablissement', ['label'=>false, 'class'=>'datepicker', 'value'=>isset($contratsPersonnel) ? $contratsPersonnel->contrat->dateetablissement : '']);  ?>
    </div>
    <label class="col-sm-1 control-label ">Durée</label>
    <div class="col-sm-2">
      <?php echo $this->Form->input('Contrats.duree', ['label'=>false, 'id'=>'dureecontrat', $contratsPersonnel->contrat->type == 0 ? 'disabled' : '', 'value'=>isset($contratsPersonnel) ? $contratsPersonnel->contrat->duree : '']);  ?>
    </div>
    <div class="col-sm-1">
      mois
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 ">Joindre un Fichier</label>
    <div class="col-sm-10">
      <div class="input-group image-preview">
        <input type="text" class="form-control image-preview-filename" value=" " disabled>
        <span class="input-group-btn">
          <button type="button" class="btn btn-default  image-preview-clear" style="display:none;padding: 6px 20px 13px 20px;height: 34px;">
              <span class="glyphicon glyphicon-remove"></span> Clear
          </button>
          <div class="btn btn-default image-preview-input" style="padding: 6px 20px 13px 20px;height: 34px;">
            <span class="glyphicon glyphicon-folder-open"></span>
            <span class="image-preview-input-title">Browse</span>
            <?php echo $this->Form->input('document', ['label'=>false, 'type'=>'file', 'id'=>'imageUpload',
              'accept'=>'document/png,document/jpg, document/jpeg, document/doc,document/docx, document/pdf, document/xls, document/xlsx',
            ]); ?>
          </div>
          <p>
              <?php echo 'Le fichier est invalide'; ?>
          </p>
        </span>
      </div>
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

<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Marché </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('details_marche_id', ['options' => $detailsMarches, 'id'=>'detailsMarches', 'empty' => true, 'label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Montant actuel </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('ancienMontant', ['label'=>false, 'id'=>'montantProjet']);?>
    </div>
    <label class="col-sm-1 control-label ">Délai </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('ancienDelai', ['label'=>false,  'id'=>'delaisProjet']);?>
    </div>
    <label class="col-sm-1 control-label ">mois </label>
  </div>
  <div class="form-group has-feedback extraspace">
    <label " class="col-sm-2 control-label ">Date </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('dateavenant', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text', 'label'=>false]);?>
    </div>
  </div>

  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Numero </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('numero', ['label'=>false]);?>
    </div>
    <label  class="col-sm-2 control-label ">N° du visa </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('visa', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Montant de l'avenant </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('montant', ['label'=>false, 'id'=>'MntAvenant']);?>
    </div>
    <label  class="col-sm-2 control-label ">Nouveau montant </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('nouveauMontant', ['label'=>false, 'value'=>'0', 'id'=>'nvmontantProjet']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Délai de l'avenant </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('delai', ['label'=>false, 'id'=>'delaiAvenant']);?>
    </div>
    <label for="numero" class="col-sm-2 control-label ">Nouveau délai </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('nouveauDelai', ['label'=>false, 'value'=>'0', 'id'=>'nvdelaiAvenant', 'value'=>'0']);?>
    </div>
  </div>
  <div class="form-group">
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
<div class="panel panel-success no-border">
  <div class="panel-header with-border">
    <h2 class="panel-title text-center">Détails de l'avenant</h2>
  </div>
      <div class="panel-body">
        <div class="panel-body">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div id="devisContainer">
            </div>
          </div>
        </div>
        <div class="col-md-12 text-center" style="margin-top:15px;">
          <button class="btn btn-success" type= "button" id="addButton" value="">
            <span class="glyphicon glyphicon-plus"></span> Ajouter un lot
          </button>
        </div>
    </div>
    <div class="box-footer">
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
      <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
        </div>
      </div>
  </div> 
</div>
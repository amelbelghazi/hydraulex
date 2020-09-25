<div class="box-body">
  <div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#Details" data-toggle="tab">Details</a></li>
    <li><a href="#VisaCF" data-toggle="tab">Visa CF</a></li>
  </ul>
  <div class="tab-content">
    <div class="active tab-pane"  id="Details">
      <div class="form-group has-feedback extraspace">
        <label for="intitule" class="col-sm-2 control-label ">Intitulé</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('DetailsMarches.intitule', ['type'=>'text', 'label'=>false, 'value'=>end($marche->details_marches)->intitule]);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="maitres_oeuvre_id" class="col-sm-2 control-label ">Maitre d'oeuvre</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('maitres_oeuvre_id', ['label'=>false,'disabled']);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="numero" class="col-sm-2 control-label ">Numéro du marché</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('numero', ['label'=>false]);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="montant" class="col-sm-2 control-label ">Montant </label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('montant', ['label'=>false, 'value'=>end($marche->details_marches)->montant, 'disabled']);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="delai" class="col-sm-2 control-label ">Délai </label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('delai', ['label'=>false, 'value'=>end($marche->details_marches)->delai, 'disabled']);?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label for="etat_id" class="col-sm-2 control-label ">Etat</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('etat_id', ['label'=>false, 'type'=>'text', 'value'=>end($marche->etats_marches)->etat->libelle, 'disabled']);?>
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
    <div class="tab-pane"  id="VisaCF">
      <div class="form-group has-feedback extraspace">
        <label for="numero" class="col-sm-2 control-label ">Numéro du visa</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('VisasCF.numero', ['label'=>false, 'value'=> $marche->visas_cf != null ? end($marche->visas_cf)->numero : '']);?>
        </div>
      </div> 
      <div class="form-group has-feedback extraspace">
        <label for="delai" class="col-sm-2 control-label ">Date du visa </label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('VisasCF.datevisa', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text', 'value'=> $marche->visas_cf != null ? end($marche->visas_cf)->datevisa :'' ]) ?>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="form-group extraspace">
        <div class="col-sm-offset-2 col-sm-10">
      <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
        </div>
      </div>
    </div> 
  </div>
</div>
</div>

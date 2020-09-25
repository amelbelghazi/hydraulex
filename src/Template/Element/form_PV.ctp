<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Marché</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('details_marche_id', ['label'=>false, 'options' => $detailsMarches, 'empty' => true, 'value'=>$pv->has('marche') ? end($pv->marche->details_marches)->id : '']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Libellé</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('libelle', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Date</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datePV', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Numero</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('numero', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Type</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('types_PV_id', ['label'=>false, 'options' => $typesPVs, 'empty' => true, 'id'=>'typesliste']);?>
    </div>
    <div class="col-sm-1">
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#TypePVpopup']) ?>
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
<!-- /.box-body -->
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>
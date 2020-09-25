<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label for="marche_id" class="col-sm-2 control-label ">Marché</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('details_marche_id', ['options' => $detailsMarches, 'empty' => true, 'label'=>false, 'class' =>'form-control', 'placeholder'=>'Selectionner un marché', 'value'=> $ods->has('marche')? $ods->marche->has('details_marches')? end($ods->marche->details_marches)->id :'' :'', 'required']); ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="dateODS" class="col-sm-2 control-label ">Date </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('dateODS', ['label'=>false, 'class' =>'datepicker form-control', 'type' => 'text', 'required']); ?>
    </div>
  </div>
   <div class="form-group has-feedback extraspace">
    <label for="numero" class="col-sm-2 control-label ">Numero </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('numero', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Saisissez le numéro de l\'ODS', 'required']); ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace"> 
    <label for="numero" class="col-sm-2 control-label ">Chantiers </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('chantiers', ['label'=>false, 'style'=>'width: 100%', 'multiple'=>'multiple', 'class' =>'select2', 'required']); ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="types_ODS_id" class="col-sm-2 control-label ">Type </label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('types_ODS_id', ['id'=>'typesods', 'options' => $typesODSs, 'empty' => true, 'label'=>false, 'class' =>'form-control', 'required']); ?>
    </div>
    <div class="col-sm-1"> 
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#typeODSPopup']) ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="observation" class="col-sm-2 control-label ">Observation </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('observation', ['rows'=>2, 'label'=>false, 'class' =>'form-control']); ?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 ">Joindre un Fichier</label>
    <div class="col-sm-10">
        <div class="input-group image-preview">
          <input type="text" class="form-control image-preview-filename" value="<?php echo($ods->fichier) ?> " disabled>
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
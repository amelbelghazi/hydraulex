
<div class="form-group col-sm-12 has-feedback">
  <label for="objet" class="col-sm-2 control-label ">objet</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('objet', ['label'=>false, 'class' =>'form-control', 'name' =>'objet', 'placeholder'=>'Saisissez l\'objet']);?>
  </div> 
</div>
<div class="form-group col-sm-12 has-feedback">
  <label for="datecorrespondance" class="col-sm-2 control-label ">Date de Courriers</label>
  <div class="col-sm-10">
    <?php   echo $this->Form->input('datecorrespondance', ['label'=>false,'empty' => true, 'default' => '', 'class' => 'pull-right form-control', 'type' => 'text', 'id'=>'datepicker']);?>
  </div> 
</div>
<div class="form-group col-sm-12 has-feedback">
  <label for="observation" class="col-sm-2 control-label ">observation</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('observation', ['empty' => true, 'label'=>false, 'class' =>'form-control ', 'name' =>'observation', 'type' => 'textarea']);?>
  </div>
</div>

<div class="form-group col-sm-12 has-feedback">
  <label for="nombredocuments" class="col-sm-2 control-label ">Nombres de documents</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('nombredocuments', ['label'=>false, 'name' =>'nombredocuments']);?>
  </div> 
</div>
<div class="form-group has-feedback col-sm-12">
  <label for="destinataire_id" class="col-sm-2 control-label ">Destinataires</label>
  <div class="col-sm-9">
    <?php  echo $this->Form->input('destinataire_id', ['label'=>false,'options' => $destinataires, 'empty' => true]);?>
  </div>
  <div class="col-sm-1"> 
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#ExpediteurPopup']) ?>
  </div>
</div>

<div class="form-group col-sm-12 has-feedback">
  <label for="fichier" class="col-sm-2 control-label ">Ajouter un fichier</label>
  <div class="col-sm-10">
    <?php  echo $this->Form->input('fichier',array(
                                            'label'=>false,
                                            'type'=>'file',
                                            'accept'=>'fichier/png,fichier/jpg , fichier/jpeg, fichier/gif,fichier/docx,fichier/pdf ,fichier/doc,',

                                        ));?>
  </div>
</div>
<div class="box-footer" style="    border-top: none;">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Ajouter'), ['class' => 'btn btn-danger btn-flat']) ?>
    </div>
  </div>
</div>

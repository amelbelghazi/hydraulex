<div class="box-body">
<?php echo $this->Form->input('id', ['label'=>false, 'class' =>'hidden', 'value'=>$personnel->personne->id]);  ?> 
  <div class="form-group has-feedback extraspace">
    <label for="nom" class="col-sm-2 control-label ">Nom</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('nom', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir le nom de l\'employé', 'name' =>'nom', 'value'=>$personnel->personne->nom]);  ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="prenom" class="col-sm-2 control-label ">Prenom</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('prenom', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir le prénom de l\'employé', 'name' =>'prenom', 'value'=>$personnel->personne->prenom]);  ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="adresse" class="col-sm-2 control-label ">Adresse</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('adresse', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir l\'adresse de l\'employé', 'name' =>'adresse', 'rows'=>2, 'value'=>$personnel->personne->adresse]);  ?>
    </div>
  </div>
  <br><br>
  <div class="form-group has-feedback ">
    <label for="datedenaissance" class="col-sm-2 control-label ">Date de naissance</label>
    <div class="input-group date extrapadding">
      <?php echo $this->Form->input('datedenaissance', ['label'=>false, 'class' =>'datepicker', 'type'=>'text', 'value'=>$personnel->personne->datedenaissance]);  ?>
      <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
      </div>
    </div>
  </div>
  <div class="form-group has-feedback">
      <label for="numero" class="col-sm-2 control-label ">N° de téléphone</label>
      <div class="input-group extrapadding">
        <?php echo $this->Form->input('numero', ['label'=>false, 'class' =>'form-control', 'type'=>'text', 'id'=>'datepicker', 'data-inputmask'=>'"mask": "(99) 99-99-99-99"', 'data-mask', 'name' =>'numero', 'value'=>$personnel->personne->numero]);  ?>
        <div class="input-group-addon">
          <i class="fa fa-phone"></i>
        </div>
      </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="inputName" class="col-sm-2 control-label ">Situation familiale</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('situations_familiale_id', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Selectionner la situation familiale de l\'employé', 'name' =>'situations_familiale_id', 'options' => $situationsFamiliales, 'empty' => true, 'value'=>$personnel->personne->situations_familiale_id]);  ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label for="inputName" class="col-sm-2 control-label ">sexe</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('sexe_id', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Selectionner un type', 'name' =>'sexe_id', 'options' => $sexes, 'empty' => true, 'value'=>$personnel->personne->sexe_id]);  ?>
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
<div class="form-group has-feedback extraspace">
  <label for="intitule" class="col-sm-2 control-label ">Intitulé</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('intitule', ['label'=>false, 'class' =>'form-control', 'name' =>'intitule', 'placeholder'=>'Saisissez l\'intitule']);?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="dateaffaire" class="col-sm-2 control-label ">Date de parution</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('dateaffaire', ['label'=>false, 'class' =>'pull-right', 'name' =>'dateaffaire', 'type' => 'text', 'id'=>'datepicker']);?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="categories_affaire_id" class="col-sm-2 control-label ">Catégorie</label>
  <div class="col-sm-9">
    <?php echo $this->Form->input('categories_affaire_id', ['label'=>false, 'class' =>'form-control overlay', 'name' =>'categories_affaire_id', 'options' => $categoriesAffaires, 'empty' => true]);?>
  </div>
  <div class="col-sm-1"> 
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#CategoriePopup']) ?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="types_affaire_id" class="col-sm-2 control-label ">Type</label>
  <div class="col-sm-9">
    <?php echo $this->Form->input('types_affaire_id', ['label'=>false, 'class' =>'form-control overlay', 'name' =>'types_affaire_id', 'options' => $typesAffaires, 'empty' => true]);?>
  </div>
  <div class="col-sm-1"> 
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#TypeAffairePopup']) ?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="maitres_ouvrage_id" class="col-sm-2 control-label ">Maitre d'ouvrage</label>
  <div class="col-sm-9">
    <?php echo $this->Form->input('maitres_ouvrage_id', ['label'=>false, 'class' =>'form-control', 'name' =>'maitres_ouvrage_id', 'options' => $maitresOuvrages, 'empty' => true]);?>
  </div>
  <div class="col-sm-1"> 
    <?= $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#MaitreOuvragePopup']) ?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="datecommission" class="col-sm-2 control-label ">Date d'ouverture</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('datecommission', ['label'=>false, 'class' =>'pull-right', 'name' =>'datecommission', 'type' => 'text', 'id'=>'datepicker1']);?>
  </div>
</div>
<div class="form-group has-feedback extraspace">
  <label for="wilaya_id" class="col-sm-2 control-label ">Wilaya</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('wilaya_id', ['label'=>false, 'class' =>'form-control', 'name' =>'wilaya_id', 'options' => $wilayas, 'empty' => true]);?>
  </div>
</div>
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>
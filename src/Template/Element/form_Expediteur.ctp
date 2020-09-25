<div class="form-group has-feedback extraspace">
  <label for="intitule" class="col-sm-3 control-label ">nom</label>
  <div class="col-sm-9">
    <?php echo $this->Form->input('nom', ['label'=>false, 'class' =>'form-control', 'name' =>'nom', 'placeholder'=>'Saisissez le nom']);?>
  </div> 
</div>
<div class="form-group has-feedback extraspace">
  <label for="intitule" class="col-sm-3 control-label ">adresse</label>
  <div class="col-sm-9">
    <?php echo $this->Form->input('adresse', ['label'=>false, 'class' =>'form-control', 'name' =>'adresse', 'placeholder'=>'Saisissez l\'adresse']);?>
  </div> 
</div>
<div class="form-group has-feedback extraspace">
  <label for="intitule" class="col-sm-3 control-label ">N° Fixe</label>
  <div class="col-sm-9">
    <?php   echo $this->Form->input('numeroFixe', ['label'=>false, 'class' =>'form-control', 'name' =>'numeroFixe', 'placeholder'=>'Saisissez numero du fixe de l\'Expediteur']);?>
  </div> 
</div>

<div class="form-group has-feedback extraspace">
  <label for="intitule" class="col-sm-3 control-label ">N° Portable</label>
  <div class="col-sm-9">
    <?php   echo $this->Form->input(' numeroPortable', ['label'=>false, 'class' =>'form-control', 'name' =>' numeroPortable', 'placeholder'=>'Saisissez numero du Portable de l\'Expediteur']);?>
  </div> 
</div>

<div class="box-footer" style="    border-top: none;">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Ajouter'), ['class' => 'btn btn-danger btn-flat']) ?>
    </div>
  </div>
</div>

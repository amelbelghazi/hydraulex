<div class="form-group has-feedback extraspace">
  <label for="libelle" class="col-sm-2 control-label ">libelle</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('libelle', ['label'=>false, 'class' =>'form-control', 'name' =>'libelle', 'placeholder'=>'Saisissez l\'libelle']);?>
  </div> 
</div>

<div class="form-group has-feedback extraspace">
  <label for="pourcentage" class="col-sm-2 control-label ">pourcentage</label>
  <div class="col-sm-10">
    <?php echo $this->Form->input('pourcentage', ['label'=>false, 'class' =>'form-control', 'name' =>'pourcentage', 'placeholder'=>'Saisissez le pourcentage']);?>
  </div> 
</div>


<div class="box-footer" style="    border-top: none;">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>

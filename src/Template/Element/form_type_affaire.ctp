<div class="box-body">
  <div class="form-group has-feedback">
    <label for="libelle" class="col-sm-2 control-label ">Type</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('libelle', ['label'=>false, 'class' =>'form-control', 'name' =>'libelle', 'placeholder'=>'Saisissez le type']);?>
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
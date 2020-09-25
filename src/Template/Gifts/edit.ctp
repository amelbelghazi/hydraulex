<section class="content-header">
  <h1>
    Gift
    <small><?= __('Edit') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($gift, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="personne_id" class="col-sm-2 control-label ">Pour </label>
              <div class="col-sm-9">
                <?php echo $this->Form->input('personne_id', ['label'=>false, 'class' =>'form-control', 'name' =>'personne_id', 'options' => $personnes, 'empty' => true]);?>
              </div>
              <div class="col-sm-1"> 
                <?= $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'action'=>'callModal', 'data-target'=>'#PersonnePopup']) ?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="types_gift_id" class="col-sm-2 control-label ">type de cadeau </label>
              <div class="col-sm-9">
                <?php echo $this->Form->input('types_gift_id', ['label'=>false, 'class' =>'form-control', 'name' =>'types_gift_id', 'options' => $typesGifts, 'empty' => true]);?>
              </div>
              <div class="col-sm-1"> 
                <?= $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'action'=>'callModal', 'data-target'=>'#TypeCadeauPopup']) ?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="qte" class="col-sm-2 control-label ">Nombre </label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('qte', ['label'=>false, 'class' =>'form-control', 'name' =>'qte', 'options' => $typesGifts, 'empty' => true]);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="montantmontantmontant" class="col-sm-2 control-label ">Valeur </label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('montantmontant', ['label'=>false, 'class' =>'form-control', 'name' =>'montant']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="datecadeau" class="col-sm-2 control-label ">Date </label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('datecadeau', ['empty' => true, 'label'=>false, 'class' =>'form-control datepicker', 'name' =>'datecadeau', 'type' => 'text']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="observation" class="col-sm-2 control-label ">Observation </label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('observation', ['empty' => true, 'label'=>false, 'class' =>'form-control datepicker', 'name' =>'observation', 'type' => 'text']);?>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <?php $this->Form->button(__('Save'), ['class' => 'btn btn-danger btn-flat']) ?>
              </div>
            </div>
          </div>
        <?php $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

<?php
$this->Html->css([
    '/plugins/daterangepicker/daterangepicker',
    '/plugins/datepicker/datepicker3',
    '/plugins/iCheck/all',
    '/plugins/colorpicker/bootstrap-colorpicker.min',
    '/plugins/timepicker/bootstrap-timepicker.min',
    '/plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  '/plugins/select2/select2.full.min',
  '/plugins/input-mask/jquery.inputmask',
  '/plugins/input-mask/jquery.inputmask.date.extensions',
  '/plugins/input-mask/jquery.inputmask.extensions',
  '/plugins/datepicker/bootstrap-datepicker',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<?php $this->end(); ?>
        
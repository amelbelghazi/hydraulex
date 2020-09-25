<section class="content-header">
  <h1>
    Personne
    <small><?= __('Add') ?></small>
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
        <?= $this->Form->create($personne, array('role' => 'form')) ?>
          <div class="box-body">
          <div class="form-group has-feedback extraspace">
              <label for="nom" class="col-sm-2 control-label ">Nom</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('nom', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir le nom de l\'employé', 'name' =>'nom']);  ?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="prenom" class="col-sm-2 control-label ">Prenom</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('prenom', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir le prénom de l\'employé', 'name' =>'prenom']);  ?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="adresse" class="col-sm-2 control-label ">Adresse</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('adresse', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir l\'adresse de l\'employé', 'name' =>'adresse', 'rows'=>2]);  ?>
              </div>
            </div>
            <br><br>
            <div class="form-group has-feedback ">
              <label for="datedenaissance" class="col-sm-2 control-label ">Date de naissance</label>
              <div class="input-group date extrapadding">
                <?php echo $this->Form->input('datedenaissance', ['label'=>false, 'class' =>'form-control  pull-right', 'type'=>'text', 'id'=>'datepicker', 'name' =>'datedenaissance']);  ?>
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
              </div>
            </div>
            <div class="form-group has-feedback">
                <label for="numero" class="col-sm-2 control-label ">N° de téléphone</label>
                <div class="input-group extrapadding">
                  <?php echo $this->Form->input('numero', ['label'=>false, 'class' =>'form-control', 'type'=>'text', 'id'=>'datepicker', 'data-inputmask'=>'"mask": "(99) 99-99-99-99"', 'data-mask', 'name' =>'numero']);  ?>
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">Situation familiale</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('situations_familiale_id', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Selectionner la situation familiale de l\'employé', 'name' =>'situations_familiale_id', 'options' => $situationsFamiliales, 'empty' => true]);  ?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">sexe</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('sexe_id', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Selectionner un type', 'name' =>'sexe_id', 'options' => $sexes, 'empty' => true]);  ?>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-danger btn-flat']) ?>
              </div>
            </div>
          </div>
        <?= $this->Form->end() ?>
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
        
<section class="content-header">
  <h1>
    Frais Projet
    <small><?= __('Editer') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Retour'), ['action' => 'index'], ['escape' => false]) ?>
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
        <?= $this->Form->create($fraisProjet, array('role' => 'form','type'=>'file')) ?>
         <?php echo $this->element('form_frai_projet_edit');?> 
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>
<!-- TypeFraisPopup-->
<div aria-hidden="false" role="dialog" tabindex="-1" id="TypeFraisPopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?php
        echo $this->form->create($typesFrai,array('id'=>'formTypeFrais', 'role'=>'form', 'url'=>array('controller'=>'TypesFrais', 'action' => 'add')));?>
              <?php echo $this->element('form_type_frais');?>
      </div>
        <?php
        // Close the modal, output a footer with a 'close' button
        echo $this->form->end();
        ?>
    </div>
  </div>
</div>
        <?php
$this->Html->css([
    '/plugins/datepicker/datepicker3',
  ],
  ['block' => 'css']);

$this->Html->script([
  '/plugins/input-mask/jquery.inputmask',
  '/plugins/input-mask/jquery.inputmask.date.extensions',
  '/plugins/datepicker/bootstrap-datepicker',
  '/plugins/datepicker/locales/bootstrap-datepicker.pt-BR',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $(".datepicker")
        .inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
        .datepicker({
            language:'en',
            format: 'dd/mm/yyyy'
        });
  });
</script>
<?php $this->end(); ?>
        
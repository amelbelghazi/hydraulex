<section class="content-header">
  <h1>
    Achat
    <small><?= __('Edition') ?></small>
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
          <h3 class="box-title"><?= __('Détails') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($achat, array('role' => 'form')) ?>
          <div class="box-body">
            <?= $this->element('form_achats');?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>
<?php
$this->Html->css([
    '/plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  '/plugins/datatables/jquery.dataTables.min',
  '/plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>
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
  '/js/jquery.autocomplete.min',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Datemask mm/dd/yyyy
    $(".datepicker")
        .inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
        .datepicker({
            language:'en',
            format: 'dd/mm/yyyy'
        });
  });
</script>
<?php $this->end(); ?>
        
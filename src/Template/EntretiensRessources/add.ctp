<section class="content-header">
  <h1>
    Entretiens Ressource
    <small><?= __('Ajout') ?></small>
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
        <?= $this->Form->create($entretiensRessource, array('role' => 'form')) ?>
          <?= $this->element('form_entretien_ressource'); ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

<?php
$this->Html->css([
    '/plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  '/plugins/select2/select2.full.min',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<?php $this->end(); ?>




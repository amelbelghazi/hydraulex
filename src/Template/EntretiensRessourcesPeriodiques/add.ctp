<section class="content-header">
  <h1>
    Entretiens Ressources Periodique
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
        <?= $this->Form->create($entretiensRessourcesPeriodique, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('entretiens_ressource_id', ['options' => $entretiensRessources, 'empty' => true]);
            echo $this->Form->input('garage_id', ['options' => $garages, 'empty' => true]);
            echo $this->Form->input('dateentretien', ['empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);
            echo $this->Form->input('modified_by');
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

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
    //Datemask mm/dd/yyyy
    $(".datepicker")
        .inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"})
        .datepicker({
            language:'en',
            format: 'mm/dd/yyyy'
        });
  });
</script>
<?php $this->end(); ?>
        
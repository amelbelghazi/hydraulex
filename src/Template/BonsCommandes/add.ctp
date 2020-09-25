<section class="content-header">
  <h1>
    Bons Commande
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
        <?= $this->Form->create($bonsCommande, array('role' => 'form')) ?>
          <?= $this->element('form_boncommande');?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>
<div aria-hidden="false" role="dialog" tabindex="-1" id="fournisseurPopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?php
        echo $this->form->create($fournisseur,array('id'=>'formFournisseur', 'role'=>'form', 'url'=>array('controller'=>'Fournisseurs', 'action' => 'add')));?>
              <?php echo $this->element('form_maitre_ouvrage');?>
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
    '/plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  '/plugins/input-mask/jquery.inputmask',
  '/plugins/input-mask/jquery.inputmask.date.extensions',
  '/plugins/datepicker/bootstrap-datepicker',
  '/plugins/datepicker/locales/bootstrap-datepicker.pt-BR',
  '/plugins/select2/select2.full.min',
  '/js/jquery.autocomplete.min',
],
['block' => 'script']);
?>
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

<?php $this->start('scriptBottom'); ?>
<script>
    $(function () {
      $(".select2").select2();
    //Datemask dd/mm/yyyy
    $(".datepicker")
        .inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
        .datepicker({
            language:'en',
            format: 'dd/mm/yyyy'
        });
  });
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php $this->end(); ?>
        
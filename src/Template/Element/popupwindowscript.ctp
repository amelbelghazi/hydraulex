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
    $('#datepicker1').datepicker({
      autoclose: true
    });
  });
</script>
<?php $this->end(); ?>
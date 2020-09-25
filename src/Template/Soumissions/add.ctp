<section class="content-header">
  <h1>
    Soumissions
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
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($soumission, array('role' => 'form')) ?>
          <?php echo $this->element('form_soumission');?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

<!--
  partie soumissionnaire
-->
<div aria-hidden="false" role="dialog" tabindex="-1" id="SoumissionnairePopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
      <?php echo $this->form->create($soumissionnaire,array('id'=>'formSoumissionnaire', 'role'=>'form', 'url'=>array('controller'=>'Soumissionnaires', 'action' => 'add')));?>
            <?php echo $this->element('form_soumissionnaire'); ?>
      </div>
      <?php $this->Form->end() ?>
    </div>
  </div>
</div>


<section class="content-header">
  <h1>
    Courriers Départ
    <small><?= __('ajouter') ?></small>
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
          <h3 class="box-title"><?= __('ajouter Courrier Départ ') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($correspondancesSortante, array('role' => 'form','type'=>'file')) ?>
          <div class="box-body">
            <?php echo $this->element('form_correspondances-sortantes');?>
          </div>
         
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

<!--
  partie Expediteur
-->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="ExpediteurPopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?= $this->Form->create($destinataire, array('id'=>'formExpediteur', 'role'=>'form', 'url'=>array('controller'=>'Destinataires', 'action' => 'add'))) ?>
            <?php echo $this->element('form_Expediteur'); ?>
          <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>

<?php echo $this->element('popupwindowscript'); ?>
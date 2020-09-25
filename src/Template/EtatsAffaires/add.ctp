<section class="content-header">
  <h1>
    Etats Affaire
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
        <?= $this->Form->create($etatsAffaire, array('role' => 'form')) ?>
          <div class="box-body">
           <?php echo $this->element('form_etat_affaire'); ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

<div aria-hidden="false" role="dialog" tabindex="-1" id="EtatPopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?= $this->Form->create($etat, array('id'=>'formetat', 'role'=>'form', 'url'=>array('controller'=>'Etats', 'action' => 'add'))) ?>
            <?php echo $this->element('form_etat'); ?>
          <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>

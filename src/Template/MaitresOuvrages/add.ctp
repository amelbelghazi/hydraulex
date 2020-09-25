<section class="content-header">
  <h1>
    Maitres Ouvrage
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
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($maitresOuvrage, array('role' => 'form')) ?>
          <?= $this->element('form_maitre_ouvrage'); ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


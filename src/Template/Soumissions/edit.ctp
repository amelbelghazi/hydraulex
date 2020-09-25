<section class="content-header">
  <h1>
    Soumissions
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
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($soumission, array('role' => 'form')) ?>
          <?php  echo $this->element('form_soumission'); ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


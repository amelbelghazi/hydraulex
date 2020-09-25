<section class="content-header">
  <h1>
    Societe
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
      <!-- general form elements -->
      <div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
        <?= $this->Form->create($societe, array('role' => 'form')) ?>
	        <?= $this->element('form_societe'); ?>
        <?= $this->Form->end() ?>
      </div>
      </div>
    <!--<div class="col-md-3">	
  </div>-->
  </div>
</section>


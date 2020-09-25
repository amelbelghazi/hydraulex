<section class="content-header">
  <h1>
    Fournisseurs
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
      <div class="box-primary">
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($fournisseur, array('role' => 'form')) ?>
          <?php echo $this->element('form_maitre_ouvrage'); ?>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


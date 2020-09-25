<section class="content-header">
  <h1>
    Entretiens
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
        <?= $this->Form->create($entretien, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label class="col-sm-1">Type</label>
              <div class="col-sm-5">
                <?php echo $this->Form->input('types_ressource_id', ['label'=>false, 'options' => $typesRessources, 'empty' => true, 'id'=>'listetypesressources']);?>
              </div>
              <label class="col-sm-1">Ressource </label>
              <div class="col-sm-5">
                <?php echo $this->Form->input('ressource_id', ['label'=>false, 'empty' => true, 'id'=>'listressources']);?>
              </div>
            </div>
            <?= $this->element('form_entretien'); ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
            <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
              </div>
            </div>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

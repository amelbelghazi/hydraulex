<section class="content-header">
  <h1>
    Categories Affaire
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
        <?= $this->Form->create($categoriesAffaire, array('role'=>'form'))) ?>
          <div class="box-body">
            <div class="form-group has-feedback">
              <label for="agence" class="col-sm-2 control-label ">Catégorie</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('libelle', ['label'=>false, 'class' =>'form-control', 'name' =>'libelle', 'placeholder'=>'Saisissez le nom de la catégorie']);?>
              </div>
            </div>
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


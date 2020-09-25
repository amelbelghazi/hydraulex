<section class="content-header">
  <h1>
    Types Personnel
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
        <?= $this->Form->create($typesPersonnel, array('role' => 'form')) ?>
          <div class="box-body">
          <div class="form-group has-feedback extraspace col-sm-10">
              <label for="inputName" class="col-sm-2 control-label "> Type personnel</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('libellé', ['label'=>false, 'class' =>'form-control', 'name' =>'libellé', 'placeholder'=>'Type personnel']);?>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save'),['class' => 'btn btn-danger btn-flat']) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


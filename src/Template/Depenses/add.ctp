<section class="content-header">
  <h1>
    Depense
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
        <?= $this->Form->create($depense, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">Cause</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('cause', ['label'=>false, 'class' =>'form-control', 'name' =>'cause', 'placeholder'=>'Saisissez la cause de la dépense']);?>
              </div>
            </div> 
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">Montant</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('montant', ['label'=>false, 'class' =>'form-control', 'name' =>'montant', 'placeholder'=>'Saisissez la cause de la dépense']);?>
              </div>
            </div> 
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">Type de dépense</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('types_depense_id', ['label'=>false, 'class' =>'form-control', 'data-placeholder'=>'Selectionner un type', 'name' =>'types_depense_id', 'options' => $typesDepenses, 'empty' => true]);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">Département</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('departement_id', ['label'=>false, 'class' =>'form-control', 'data-placeholder'=>'Selectionner un département', 'name' =>'departement_id','options' => $departements, 'empty' => true]);?>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-danger btn-flat']) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


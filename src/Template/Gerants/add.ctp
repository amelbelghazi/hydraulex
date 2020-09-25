<section class="content-header">
  <h1>
    Gerant
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
        <?= $this->Form->create($gerant, array('role' => 'form')) ?>
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">Nom du gérant</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('personnel_id', ['label' => false, 'options' => $personnels, 'nom' => 'personnel_id']);?>
              </div>
            </div>
            <div class="form-group has-feedback hidden">
              <label for="inputName" class="col-sm-2 control-label ">Société </label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('societe_id', ['type'=> 'text', 'label' => false, 'options' => $societes, 'nom' => 'societe_id']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="inputName" class="col-sm-2 control-label ">Nom de la société</label>
              <div class="col-sm-10">
                <?php 
                if (!empty($societes))
                {
                  echo $this->Form->input('nom', ['label'=> false, 'class' =>'form-control', 'nom' =>'nom', 'value' => $societes->nom, 'disabled']);
                }
                else 
                {
                  echo $this->Form->input('nom', ['label'=> false, 'class' =>'form-control', 'nom' =>'nom', 'options' => $societes->nom]);
                }
                ?>
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


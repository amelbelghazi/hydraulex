<section class="content-header">
  <h1>
    Document
    <small><?= __('Edit') ?></small>
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
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($document, array('role' => 'form')) ?>
          <div class="box-body">
          <div class="form-group has-feedback col-sm-12">
                  <label for="libelle" class="col-sm-2 control-label ">libelle</label>
                  <div class="col-sm-10">
                    <?php echo $this->Form->input('libelle', ['label'=>false, 'class' =>'form-control', 'name' =>'libelle', 'placeholder'=>'Saisissez le libelle']);?>
                  </div> 
              </div>
              <div class="form-group has-feedback col-sm-12">
                <label for="tags_list" class="col-sm-2 control-label ">tags</label>
                <div class="col-sm-10">
                 <?php echo $this->Form->input('tags_list', ['label'=>false, 'class' =>'form-control', 'name' =>'tags_list', 'placeholder'=>'Saisissez le tags']);?>

                </div>
                
              </div>
          
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


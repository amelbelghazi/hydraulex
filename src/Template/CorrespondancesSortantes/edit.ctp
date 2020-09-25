<section class="content-header">
  <h1>
     Courriers Sortante
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
          <h3 class="box-title"><?= __('Modifier Les Informations') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($correspondancesSortante, array('role' => 'form')) ?>
         
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="intitule" class="col-sm-2 control-label ">Date d'envoi</label>
                <div class="col-sm-10">
                     <?php   echo $this->Form->input('datecorrespondance', ['label'=>false,'empty' => true, 'default' => '', 'class' => 'pull-right form-control', 'type' => 'text', 'id'=>'datepicker']);?>
                </div>
            </div>
          </div>
           <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="intitule" class="col-sm-2 control-label ">Objet</label>
                <div class="col-sm-10">
                   <?php echo $this->Form->input('objet', ['label'=>false, 'class' =>'form-control', 'name' =>'objet', 'placeholder'=>'Saisissez l\'objet']);?>
                </div>
            </div>
          </div>

          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="intitule" class="col-sm-2 control-label ">Observation</label>
                <div class="col-sm-10">
                     <?php echo $this->Form->input('observation', ['empty' => true, 'label'=>false, 'class' =>'form-control ', 'name' =>'observation', 'type' => 'textarea']);?>
                </div>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="intitule" class="col-sm-2 control-label ">Objet</label>
                <div class="col-sm-10">
                   <?php echo $this->Form->input('nombredocuments', ['label'=>false, 'class' =>'form-control', 'name' =>'nombredocuments', 'placeholder'=>'Saisissez le nombres de documents']);?>
                </div>
            </div>
          </div>
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="intitule" class="col-sm-2 control-label ">Destinataires</label>
                <div class="col-sm-10">
                     <?php  echo $this->Form->input('destinataire_id', ['label'=>false,'options' => $destinataires, 'empty' => true]);?>
                </div>
            </div>
          </div>
          
          
         <!-- /.box-body -->
          <div class="box-footer" style="    border-top: none;">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <?= $this->Form->button(__('Modifier'), ['class' => 'btn btn-danger btn-flat']) ?>
                </div>
              </div>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

     <?php echo $this->element('popupwindowscript'); ?>
        
<section class="content-header">
  <h1>
    Société
    <small><?= __('Modification') ?></small>
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
    <div>
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Formulaire') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body row">
        <?= $this->Form->create($societe, array('role' => 'form')) ?>
        <div class="col-md-7">
          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                <li><a href="#details" data-toggle="tab">Détails</a></li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane"  id="general">
                  <div class="form-group has-feedback">
               <?php echo $this->Form->input('nom', ['label'=>'nom', 'class' =>'form-control', 'name' =>'nom', 'placeholder'=>'Saisissez le nom de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php echo $this->Form->input('adresse', ['label'=>'adresse', 'class' =>'form-control', 'name' =>'adresse', 'placeholder'=>'Saisissez l\'addresse de la société']); ?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php echo $this->Form->input('numeroFixe', ['label'=>'N° Fixe', 'class' =>'form-control', 'name' =>'numeroFixe', 'placeholder'=>'Saisissez numero du fixe de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php echo $this->Form->input('email', ['label'=>'email', 'class' =>'form-control', 'name' =>'email', 'placeholder'=>'Saisissez l\'email de la société']);?>
                  </div>
                </div>
                <div class="tab-pane"  id="details">
                  <div class="form-group has-feedback">
                    <?php echo $this->Form->input('numeroPortable',['label'=>'N° Portable', 'class' =>'form-control', 'name' =>'numeroPortable', 'placeholder'=>'Saisissez le N° portable de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php
                  echo $this->Form->input('fax', ['label'=>'Fax', 'class' =>'form-control', 'name' =>'fax', 'placeholder'=>'Saisissez le fax de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php
                  echo $this->Form->input('nif', ['label'=>'NIF', 'class' =>'form-control', 'name' =>'nif', 'placeholder'=>'Saisissez le NIF de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php
                  echo $this->Form->input('nis', ['label'=>'NIS', 'class' =>'form-control', 'name' =>'nis', 'placeholder'=>'Saisissez le NIS de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php
                  echo $this->Form->input('nrcf', ['label'=>'NRCF', 'class' =>'form-control', 'name' =>'nrcf', 'placeholder'=>'Saisissez le NRCF de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php
                  echo $this->Form->input('article', ['label'=>'Article', 'class' =>'form-control', 'name' =>'article', 'placeholder'=>'Saisissez l\'article de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php
                  echo $this->Form->input('compte', ['label'=>'Compte', 'class' =>'form-control', 'name' =>'compte', 'placeholder'=>'Saisissez le compte de la société']);?>
                  </div>
                  <div class="form-group has-feedback">
                  <?php
                  echo $this->Form->input('agence', ['label'=>'Agence', 'class' =>'form-control', 'name' =>'agence', 'placeholder'=>'Saisissez l\'agence de la société']);?>
                  </div>
                </div>
              </div>
              <div class="form-group has-feedback">
              <div class="box-footer col-sm-10">
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-danger btn-flat']) ?>
                </div>
              </div>
          </div>
      </div>
      <div class="col-md-5"></div>
      <!-- /.box-body -->
        <?= $this->Form->end() ?>
      </div>
      </div>
    </div>
    <div class="col-md-5"></div>
  </div>
</section>


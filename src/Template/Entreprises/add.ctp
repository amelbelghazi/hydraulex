<section class="content-header">
  <h1>
    Entreprise
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
        <?= $this->Form->create($entreprise, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('nom', ['class' =>'form-control', 'name' =>'nom', 'placeholder'=>'Nom de l\'entreprise']);
            echo $this->Form->input('adresse',['class' =>'form-control', 'name' =>'adresse', 'placeholder'=>'Saisissez votre nom d\'utilisateur']);
            echo $this->Form->input('numeroFixe', ['class' =>'form-control', 'name' =>'numeroFixe', 'placeholder'=>'Numero fixe']);
            echo $this->Form->input('numeroPortable', ['class' =>'form-control', 'numeroPortable' =>'username', 'placeholder'=>'Numero portable']);
            echo $this->Form->input('fax', ['class' =>'form-control', 'name' =>'fax', 'placeholder'=>'fax']);
            echo $this->Form->input('nif', ['class' =>'form-control', 'name' =>'nif', 'placeholder'=>'nif']);
            echo $this->Form->input('nis',['class' =>'form-control', 'name' =>'nis', 'placeholder'=>'nis']);
            echo $this->Form->input('nrcf', ['class' =>'form-control', 'name' =>'nrcf', 'placeholder'=>'nrcf']);
            echo $this->Form->input('article', ['class' =>'form-control', 'name' =>'article', 'placeholder'=>'article']);
            echo $this->Form->input('compte', ['class' =>'form-control', 'name' =>'compte', 'placeholder'=>'compte']);
            echo $this->Form->input('email', ['class' =>'form-control', 'name' =>'email', 'placeholder'=>'email']);
            echo $this->Form->input('agence',['class' =>'form-control', 'name' =>'agence', 'placeholder'=>'agence']);
            echo $this->Form->input('modified_by',['class' =>'form-control', 'name' =>'modified_by', 'placeholder'=>'modified_by']);
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


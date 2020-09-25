<section class="content-header">
  <h1>
    Utilisateurs
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
    <div class="col-md-3">
     
      <div class="box box-primary">
            <div class="box-body box-profile">
              <?php echo $this->Form->create($user,array('type'=>'file','class'=>'form-horizontal','id'=>'defaultForm')) ?>
                    <?= $this->Form->input('id',array(
                        'type'=>'hidden',
                    ));?>

                    <div class="form-group">
                        <div class="col-xs-12 ">
                        <div class="col-xs-12 avatarUserEdit">
                          <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Choisir une photo de profil</label>
                            <?php echo $this->Form->input('photo',array(
                                'label'=>false,
                                'type'=>'file',
                                'id'=>'imageUpload',
                                'accept'=>'photo/png,photo/jpg, photo/jpeg, photo/gif',
                                'style'=> 'display: none'
                            )); ?>
                        </div>
                        </div>
                    </div>

                    
                
            </div>
            <!-- /.box-body -->
      </div>
    </div>
    <!-- left column -->
    <div class="col-md-9">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Détails') ?></h3>
        </div>
        <!-- /.box-header -->
      
        <!-- form start -->        
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="username" class="col-sm-2 control-label ">Nom d'utilisateur</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('username', ['label'=>false, 'class' =>'form-control', 'name' =>'username', 'placeholder'=>'Saisissez le username']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="email" class="col-sm-2 control-label ">email</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('email', ['label'=>false, 'class' =>'form-control', 'name' =>'email', 'placeholder'=>'Saisissez l\'email']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="password" class="col-sm-2 control-label ">Mot de passe</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('password', ['label'=>false, 'class' =>'form-control', 'name' =>'password', 'placeholder'=>'Saisissez le password']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="role_id" class="col-sm-2 control-label ">Role</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('role_id', ['label'=>false, 'class' =>'form-control', 'name' =>'role_id', 'placeholder'=>'Saisissez le role', 'options' => $roles, 'empty' => true]);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="societe_id" class="col-sm-2 control-label ">Société</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('societe_id', ['label'=>false, 'class' =>'form-control', 'name' =>'societe_id', 'placeholder'=>'Saisissez la societe', 'options' => $societes, 'empty' => true]);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="personne_id" class="col-sm-2 control-label ">Personnel</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('personne_id', ['label'=>false, 'class' =>'form-control', 'name' =>'personne_id', 'placeholder'=>'Saisissez la personne', 'options' => $personnes, 'empty' => true]);?>
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


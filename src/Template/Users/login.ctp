<?php $this->layout = 'login'; ?>

<!--<form action="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'login')); ?>" method="post">-->
<?= $this->Form->create() ?>
  <div class="form-group has-feedback">
    <?php
            echo $this->Form->input('username', ['label'=>'Nom d\'utilisateur', 'class' =>'form-control', 'name' =>'username', 'placeholder'=>'Saisissez votre nom d\'utilisateur']);
    ?>
    <span class="glyphicon glyphicon-envelope form-control-feedback TopSpaceAdded"></span>
  </div>
  <div class="form-group has-feedback">
    <?php
            echo $this->Form->input('password', ['type'=>'password', 'label'=>'Mot de passe', 'class' =>'form-control', 'name' =>'password', 'placeholder'=>'Saisissez votre mot de passe']);
    ?>
    <span class="glyphicon glyphicon-lock form-control-feedback TopSpaceAdded"></span>
  </div>
  <div class="form-group has-feedback">
    <?php
            echo $this->Form->input('societe_id', ['label'=>'Société', 'class' =>'form-control', 'name' =>'societe_id', 'placeholder'=>'Choisissez une entreprise', 'option'=>$societes]);
    ?>
  </div>
  <div class="row">
    <div class="col-xs-8">
      <!--<div class="checkbox icheck">
        <label>
          <input type="checkbox"> Remember Me
        </label>
      </div>-->
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <?= $this->Form->button(__('Connexion'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
    </div>
    <!-- /.col -->
  </div>
<?= $this->Form->end() ?>
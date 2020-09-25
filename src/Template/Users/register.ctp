<?php $this->layout = 'register'; ?>
<?php echo $this->Form->create($user, array('role' => 'form')) ; ?>
  <div class="form-group has-feedback">
    <?php
            echo $this->Form->input('username', ['label'=>'Nom d\'utilsateur', 'class' =>'form-control', 'name' =>'username', 'placeholder'=>'Saississez votre nom d\'utilsateur']);
    ?>
    <span class="glyphicon glyphicon-user form-control-feedback TopSpaceAdded"></span>
  </div>
  <div class="form-group has-feedback">
    <?php
            echo $this->Form->input('email', ['label'=>'Email', 'class' =>'form-control', 'name' =>'email', 'placeholder'=>'Saisissez votre email']);
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
  <!--<div class="form-group has-feedback">
    <?php
            //echo $this->Form->input('passwordRetype', ['type'=>'password', 'label'=>'Confirmation mot de passe', 'class' =>'form-control', 'name' =>'passwordRetype', 'placeholder'=>'Confirmer votre mot de passe']);
    ?>
    <span class="glyphicon glyphicon-log-in form-control-feedback TopSpaceAdded"></span>
  </div>-->
  <div class="row">
    <div class="col-xs-8">
     <!--<div class="checkbox icheck">
        <label>
          <input type="checkbox"> J'accepte les termes de <a href="#">terms</a>
        </label>
      </div>-->
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <?= $this->Form->button(__('S\'inscrire'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
    </div>
    <!-- /.col -->
  </div>
<?php echo $this->Form->end(); ?>
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
  <li class="active"><a href="#general" data-toggle="tab">General</a></li>
  <li><a href="#details" data-toggle="tab">Détails</a></li>
  <li><a href="#banque" data-toggle="tab">Banque</a></li>
</ul>
<div class="tab-content">
  <div class="active tab-pane"  id="general">
    <div class="form-group has-feedback">
      <label for="nom" class="col-sm-2 control-label ">Nom</label>
      <div class="col-sm-10">
        <?php echo $this->Form->input('nom', ['label'=>false, 'class' =>'form-control', 'name' =>'nom', 'placeholder'=>'Saisissez le nom de la société']);?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="adresse" class="col-sm-2 control-label ">Adresse</label>
      <div class="col-sm-10">
    <?php echo $this->Form->input('adresse', ['label'=>false, 'class' =>'form-control', 'name' =>'adresse', 'placeholder'=>'Saisissez l\'addresse de la société']); ?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="numeroFixe" class="col-sm-2 control-label ">N° fixe</label>
      <div class="col-sm-10">
    <?php echo $this->Form->input('numeroFixe', ['label'=>false, 'class' =>'form-control', 'name' =>'numeroFixe', 'placeholder'=>'Saisissez numero du fixe de la société']);?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="email" class="col-sm-2 control-label ">email</label>
      <div class="col-sm-10">
    <?php echo $this->Form->input('email', ['label'=>false, 'class' =>'form-control', 'name' =>'email', 'placeholder'=>'Saisissez l\'email de la société']);?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="intitule" class="col-sm-2 control-label ">N° Portable</label>
      <div class="col-sm-10">
      <?php echo $this->Form->input('numeroPortable',['label'=>false, 'class' =>'form-control', 'name' =>'numeroPortable', 'placeholder'=>'Saisissez le N° portable de la société']);?>
        </div>
    </div>
    <div class="form-group has-feedback">
      <label for="fax" class="col-sm-2 control-label ">Fax</label>
      <div class="col-sm-10">
    <?php
    echo $this->Form->input('fax', ['label'=>false, 'class' =>'form-control', 'name' =>'fax', 'placeholder'=>'Saisissez le fax de la société']);?>
      </div>
    </div>
  </div>
  <div class="tab-pane"  id="details">            
    <div class="form-group has-feedback">
      <label for="nif" class="col-sm-2" control-label ">NIF</label>
      <div class="col-sm-10">
    <?php
    echo $this->Form->input('nif', ['label'=>false, 'class' =>'form-control', 'name' =>'nif', 'placeholder'=>'Saisissez le NIF de la société']);?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="nis" class="col-sm-2" control-label ">NIS</label>
      <div class="col-sm-10">
    <?php
    echo $this->Form->input('nis', ['label'=>false, 'class' =>'form-control', 'name' =>'nis', 'placeholder'=>'Saisissez le NIS de la société']);?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="nrcf" class="col-sm-2" control-label ">NRCF</label>
      <div class="col-sm-10">
    <?php
    echo $this->Form->input('nrcf', ['label'=>false, 'class' =>'form-control', 'name' =>'nrcf', 'placeholder'=>'Saisissez le NRCF de la société']);?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="article" class="col-sm-2" control-label ">Article</label>
      <div class="col-sm-10">
    <?php
    echo $this->Form->input('article', ['label'=>false, 'class' =>'form-control', 'name' =>'article', 'placeholder'=>'Saisissez l\'article de la société']);?>
      </div>
    </div>
  </div>
  <div class="tab-pane"  id="banque">  
    <div class="form-group has-feedback">
      <label for="compte" class="col-sm-2" control-label ">N° Compte</label>
      <div class="col-sm-10">
    <?php
    echo $this->Form->input('compte', ['label'=>false, 'class' =>'form-control', 'name' =>'compte', 'placeholder'=>'Saisissez le compte de la société']);?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="agence" class="col-sm-2" control-label ">Agence</label>
      <div class="col-sm-10">
    <?php
    echo $this->Form->input('agence', ['label'=>false, 'class' =>'form-control', 'name' =>'agence', 'placeholder'=>'Saisissez l\'agence de la société']);?>
      </div>
    </div>
  </div>
</div>
<div class="box-footer">
  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['type'=>'submit', 'id'=>'SubmitMaitreOuvrage','class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>
</div>
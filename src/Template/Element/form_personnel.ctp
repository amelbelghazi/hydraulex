<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#general" data-toggle="tab">Général</a></li>
    <li><a href="#contrat" data-toggle="tab">Contrat</a></li>
    <li><a href="#affectation" data-toggle="tab">Affectation</a></li>
  </ul>
  <div class="tab-content">
    <div class="active tab-pane"  id="general">
      <div class="form-group has-feedback extraspace">
        <label  class="col-sm-2 control-label ">Nom</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('nom', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir le nom de l\'employé', 'name' =>'nom', 'value'=>$personnel->has('personne')? $personnel->personne->nom : '']);  ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label class="col-sm-2 control-label ">Prenom</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('prenom', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Veuillez saisir le prénom de l\'employé', 'name' =>'prenom', 'value'=>$personnel->has('personne')? $personnel->personne->prenom:'']);  ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label class="col-sm-2 control-label ">Date de naissance</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('datedenaissance', ['label'=>false, 'class' =>'datepicker', 'type'=>'text', 'value'=>$personnel->has('personne')? $personnel->personne->datedenaissance : '']);  ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
          <label class="col-sm-2 control-label ">N° de téléphone</label>
          <div class="col-sm-10">
            <?php echo $this->Form->input('numero', ['label'=>false,'type'=>'text', 'value'=>$personnel->has('personne')? $personnel->personne->numero : '']);  ?>
          </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label  class="col-sm-2 control-label ">Situation familiale</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('situations_familiale_id', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Selectionner la situation familiale de l\'employé', 'name' =>'situations_familiale_id', 'options' => $situationsFamiliales, 'empty' => true, 'value'=>$personnel->has('personne')? $personnel->personne->situations_familiale_id : '']);  ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label  class="col-sm-2 control-label ">sexe</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('sexe_id', ['label'=>false, 'class' =>'form-control', 'placeholder'=>'Selectionner un type', 'name' =>'sexe_id', 'options' => $sexes, 'empty' => true, 'value'=>$personnel->has('personne')? $personnel->personne->sexe_id : '']);  ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label  class="col-sm-2 control-label ">Adresse</label>
        <div class="col-sm-10">
          <?php echo $this->Form->input('adresse', ['label'=>false, 'placeholder'=>'Veuillez saisir l\'adresse de l\'employé', 'rows'=>2, 'value'=>$personnel->has('personne')? $personnel->personne->adresse: '']);  ?>
        </div>
      </div>
      <br>
      <br>
    </div>
    <div class="tab-pane"  id="contrat">
      <div class="form-group has-feedback extraspace">
        <label  class="col-sm-2 control-label ">Numero </label>
        <div class="col-sm-3">
          <?php echo $this->Form->input('Contrats.numero', ['label'=>false, 'value'=>isset($personnel) && $personnel->has('contrats_personnels') ? end($personnel->contrats_personnels)->contrat->numero : '']);  ?>
        </div>
        <label  class="col-sm-1 control-label ">Etat </label>
        <div class="col-sm-2">
          <?php echo $this->Form->input('Contrats.types_etats_contrat_id', ['label'=>false, 'empty'=>true, 'options'=>$typesEtatsContrats, 'value'=>isset($personnel) && $personnel->has('contrats_personnels') ? end(end($personnel->contrats_personnels)->contrat->etats_contrats)->types_etats_contrat->id : '']);  ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label  class="col-sm-2 control-label ">Type</label>
        <div class="col-sm-3">
          <?php echo $this->Form->input('Contrats.type', ['label'=>false, 'id'=>'typecontrat', 'options' => ['CDI', 'CDD'], 'empty' => true, 'value'=>isset($personnel) && $personnel->has('contrats_personnels') ? end($personnel->contrats_personnels)->contrat->type : '']);  ?>
        </div>
        <label class="col-sm-1 control-label ">Débute le</label>
        <div class="col-sm-2">
          <?php echo $this->Form->input('Contrats.dateetablissement', ['label'=>false, 'class'=>'datepicker', 'value'=>isset($personnel) && $personnel->has('contrats_personnels') ? end($personnel->contrats_personnels)->contrat->dateetablissement : '']);  ?>
        </div>
        <label class="col-sm-1 control-label ">Durée</label>
        <div class="col-sm-2">
          <?php echo $this->Form->input('Contrats.duree', ['label'=>false, 'id'=>'dureecontrat', 'disabled', 'value'=>isset($personnel) && $personnel->has('contrats_personnels') ? end($personnel->contrats_personnels)->contrat->duree : '']);  ?>
        </div>
        <div class="col-sm-1">
          mois
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label class="col-sm-2 ">Joindre un Fichier</label>
        <div class="col-sm-10">
          <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" value=" " disabled>
            <span class="input-group-btn">
              <button type="button" class="btn btn-default  image-preview-clear" style="display:none;padding: 6px 20px 13px 20px;height: 34px;">
                  <span class="glyphicon glyphicon-remove"></span> Clear
              </button>
              <div class="btn btn-default image-preview-input" style="padding: 6px 20px 13px 20px;height: 34px;">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <?php echo $this->Form->input('Contrats.document', ['label'=>false, 'type'=>'file', 'id'=>'imageUpload',
                  'accept'=>'document/png,document/jpg, document/jpeg, document/doc,document/docx, document/pdf, document/xls, document/xlsx',
                ]); ?>
              </div>
              <p>
                  <?php echo 'Le fichier est invalide'; ?>
              </p>
            </span>
          </div>
        </div>
      </div>
    </div>
    <?php 
      if(isset($personnel) && $personnel->has('positions')){
        $position = end($personnel->positions)->has('positions_administratives') && !empty(end($personnel->positions)->positions_administratives)? end(end($personnel->positions)->positions_administratives) : end(end($personnel->positions)->positions_chantiers);
        $admin = end($personnel->positions)->has('positions_administratives') && !empty(end($personnel->positions)->positions_administratives)? 1 : 0;
     }
    ?>
    <div class="tab-pane"  id="affectation">
        <div class="form-group has-feedback extraspace">
        <label  class="col-sm-2 control-label ">Type </label>
        <div class="col-sm-4">
          <?php echo $this->Form->input('Fonctions.types_fonction_id', ['label'=>false, 'options'=>['', 'Administration', 'Chantier'], 'id'=>'typefonction', 'value'=>isset($admin)? $admin == 1 ? 1: 2 : '']);  ?>
        </div>
        <label class="col-sm-1 control-label ">Projet </label>
        <div class="col-sm-5">
          <?php echo $this->Form->input('Fonctions.details_projet_id', ['label'=>false, 'empty'=>true, 'options'=>$detailsMarches, 'id'=>'listeprojets', 'disabled', 'value'=>isset($admin) ? $admin == 1? '' : end($position->chantier->marche->details_marches)->id:'']);  ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label class="col-sm-2 control-label"> Département/Chantier </label>
        <div class="col-sm-4">
          <?php echo $this->Form->input('Fonctions.position', ['label'=>false, 'type'=>'select', 'id'=>'listeaffectation', 'value'=>isset($admin)? $admin == 1 ? $position->departement->id : $position->chantier->id: '', 'options'=> isset($admin) ? $positions: '']);  ?>
        </div>
        <label class="col-sm-1 control-label ">Fonction </label>
        <div class="col-sm-4">
          <?php echo $this->Form->input('Fonctions.fonction_id', ['label'=>false, 'type'=>'select', 'id'=>'listefonction', 'value'=>isset($admin) ? $position->fonction->id : '', 'options'=> isset($admin) ? $fonctions: '']);  ?>
        </div>
        <div class="col-sm-1">
        <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#fonctionPopup']) ?>
        </div>
      </div>
      <div class="form-group has-feedback extraspace">
        <label class="col-sm-2 control-label ">Salaire </label>
        <div class="col-sm-3">
          <?php echo $this->Form->input('Fonctions.salaire', ['label'=>false, 'value'=> $personnel->has('salaires')? end($personnel->salaires)->montant :'']);  ?>
        </div>
        <label class="col-sm-1 control-labe">
          /mois
        </label>
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
</div>
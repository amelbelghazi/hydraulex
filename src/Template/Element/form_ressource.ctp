<div class="box-body">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab">General</a></li>
      <li><a href="#piece" data-toggle="tab">Pièces de rechange</a></li>
      <li><a href="#affectation" data-toggle="tab">Affectation</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane"  id="general">
        <div class="form-group has-feedback extraspace">
          <label class="col-sm-1">Type</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('types_produit_id', ['label'=>false, 'id'=>'typeRessource', 'empty'=> true, 'options'=>$typesProduits]);?>
          </div>
          <label class="col-sm-1">Produit</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('produit', ['label'=>false, 'id'=>'listeproduit', 'type'=>'select',  'empty'=> true]);?>
          </div>
          <label class="col-sm-1">Dépot</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('depot_id', ['label'=>false, 'id'=>'listedepot', 'type'=>'select',  'empty'=> true]);?>
          </div>
        </div>
        <div class="form-group has-feedback extraspace">
          <label class="col-sm-1">Etat</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('types_etats_ressource_id', ['label'=>false, 'empty' => true, 'options'=>$typesEtatsRessource]);?>
          </div>
          <div class="col-sm-8"></div>
        </div>
        <div class="form-group has-feedback ">
          <label class="col-sm-1">Code/Ref</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('code', ['label'=>false]);?>
          </div>
          <label class="col-sm-1">Nom</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('nom', ['label'=>false, 'id'=>'ressource-name']);?>
          </div>
          <label class="col-sm-1  ">Type</label>
          <div class="col-sm-2">
            <?php echo $this->Form->input('types_ressource_id', ['label'=>false,  'empty'=> true, 'id'=>'typesRessourcesliste', 'options'=>$typesRessources]);?>
          </div>
          <div>
            <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#typeRessourcePopup']) ?>
          </div>
        </div>
        <div class="form-group has-feedback ">
          <label class="col-sm-1">Mis en service</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('datedebutservice', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
          </div>
          <label class="col-sm-1">Debut de circulation</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('datedebutcirculation', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
          </div>
          <label class="col-sm-1">Qte</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('qte', ['label'=>false, 'id' => 'qteressource', 'value'=>1]);?>
          </div>
        </div>
      </div>
      <div class="tab-pane"  id="piece">
          <table class="table table-hover" id="piece-table">
            <thead>
              <tr>
                  <td colspan="3"></td>
                  <td class="actions">
                      <a href="#" class="add btn btn-danger btn-xs">Ajouter</a>
                  </td>
              </tr>
              <tr>
                <th></th>
                <th>Ref</th>
                <th>Description</th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if ($ressource->has('details_frais_projets')) :?>
                <?php for ($key = 0; $key < count($fraisProjet->details_frais_projets); $key++) :?>
                    <?php echo $this->element('form_piece', array('key' => $key, 'detailsfraisprojet'=>$fraisProjet->details_frais_projets[$key]));?>
                <?php endfor;?>
              <?php endif;?>
            </tbody>
          </table>
      </div>
      <div class="tab-pane"  id="affectation">
        <div class="form-group has-feedback extraspace">
          <label class="col-sm-1">Marché</label>
            <div class="col-sm-3">
            <?php echo $this->Form->input('details_marche_id', ['label'=>false, 'id'=>'listemarches', 'options'=>$detailsMarches,  'empty'=> true]);?>
          </div>
          <label class="col-sm-1"> Type</label>
          <div class="col-sm-2">
            <select class="form-control" id="typeAffectation" name="type_affectation">
              <option active></option>
              <option value="0">Administration</option>
              <option value="1">Chantier</option>
            </select>
          </div>
          <label class="col-sm-2">Chantier/Département</label>
            <div class="col-sm-3">
            <?php echo $this->Form->input('location_id', ['label'=>false, 'id'=>'listeaffectation', 'type'=>'select',  'empty'=> true]);?>
          </div>
        </div>
        <div class="form-group has-feedback extraspace">
          <label class="col-sm-1"> Personnel</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('personne_id', ['label'=>false, 'id'=>'listepersonnels', 'type'=>'select',  'empty'=> true]);?>
          </div>
          <label class="col-sm-1"> Durée</label>
          <div class="col-sm-2">
            <?php echo $this->Form->input('duree', ['label'=>false]);?>
          </div>
          <label class="col-sm-2">Parc</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('parc_id', ['label'=>false, 'disabled', 'empty' => true, 'type' => 'select', 'id'=>'listeparc']);?>
          </div>
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
</div>
<script id="piece-template" type="text/x-underscore-template">
    <?php echo $this->element('form_piece');?>
</script>
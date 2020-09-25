<div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Département </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('departement_id', ['label'=>false, 'options' => $departements, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Proprietaire </label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('proprietaire_id', ['label'=>false, 'id'=>'proprietaireliste', 'options' => $proprietaires, 'empty' => true]);?>
    </div>
    <div class="col-sm-1"> 
    <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat dropdown-toggle', 'data-target'=>'#ProprietairePopup']) ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Date </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('datelocation', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
    <label class="col-sm-2 control-label ">Numero </label>
    <div class="col-sm-4">
      <?php echo $this->Form->input('numero', ['label'=>false]);?>
    </div>
  </div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="">
        <div class="box-body">
            <table class="table table-hover" id="location-table">
            <thead>
              <tr>
                <th class="col-sm-2">Ref</th>
                <th class="col-sm-3">Nom</th>
                <th class="col-sm-1">Durée</th>
                <th class="col-sm-2">Montant</th>
                <th class="col-sm-3">Parc</th>
                <th class="col-sm-1"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if ($location->has('locations_details')) :?>
                <?php for ($key = 0; $key < count($location->locations_details); $key++) :?>
                    <?php echo $this->element('form_location_details', array('key' => $key, 'detailslocations'=>$location->locations_details[$key]));?>
                <?php endfor;?>
              <?php endif;?>
            </tbody>
            <tfoot>
              <tr>
                  <td colspan="5"></td>
                  <td class="actions">
                      <a href="#" class="add btn btn-danger btn-xs">Ajouter</a>
                  </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
   <div class="form-group has-feedback extraspace">
    <label  class="col-sm-1 control-label">Total</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('total', ['id'=>'totalinput', 'label'=>false, 'enabled'=>false]);?>
    </div>
    <label  class="col-sm-1 control-label">TVA</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('tva', ['id'=>'tva', 'label'=>false]);?>
    </div>
    <label class="col-sm-1 control-label">TTC</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('ttc', ['id'=>'ttc', 'label'=>false, 'value'=> isset($location) ? ($location->tva * $location->total/100) + $location->total : '0']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-1 control-label">Réglée</label>
    <div class="col-sm-5">
      <?php echo $this->Form->input('regle', ['label'=>false, 'options' => ['Oui', 'Non'], 'id'=>'regle', 'empty' => true]);?>
    </div>
    <label class="col-sm-1 control-label">Mode de règlement</label>
    <div class="col-sm-5">
      <?php echo $this->Form->input('modes_reglement_id', ['id'=>'mode', 'label'=>false, 'id'=>'modereglement', 'options' => $modesReglements, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <div  class=" <?=isset($location)? ($location->regle == 0)? "hidden" :'' :'hidden'?>" id="versementdiv">
      <label  class="col-sm-1 control-label">Versement</label>
      <div class="col-sm-5">
        <?php 
        $sum = 0; 
          if (isset($dette)){
            if($dette->has('versements_locations')){
              foreach ($dette->versements_locations as $versement) {
                $sum += $versement->montant;
              }
            }
          }?>
        <?php echo $this->Form->input('versement', ['label'=>false, 'type'=>'text', 'value'=> $sum]);?>
      </div>
    </div>
    <div class=' <?=isset($location)? $location->has("modes_reglement")? $location->modes_reglement->libelle == "Espèce"? "hidden" : '' : 'hidden' : 'hidden' ?>' id="chequediv">
      <label  class="col-sm-1 control-label">N° chèque</label>
      <div class="col-sm-5">
        <?php echo $this->Form->input('cheque', ['label'=>false, 'value'=>isset($cheque)? $cheque->numero : '']);?>
      </div>
    </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <?php echo $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?> 
    </div>
  </div>
</div>

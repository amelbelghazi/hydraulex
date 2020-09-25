<div class="box-body">
  <div class="form-group has-feedback ">
    <label class="col-sm-2 control-label ">Fournisseur</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('fournisseur_id', ['label'=>false, 'options' => $fournisseurs, 'id'=>'fournisseursliste', 'empty' => true]);?>
    </div>
    <div>
      <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#fournisseurPopup']) ?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label  class="col-sm-2 control-label ">Département</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('departement_id', ['label'=>false, 'options' => $departements, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Date</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datebon', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2 control-label ">Numero</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('numero', ['label'=>false]);?>
    </div>
  </div>
 <div class="form-group has-feedback">
    <label class="col-sm-2" >Produits</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('produit_code', ['label'=>false, 'id'=>'autocomplete', 'placeholder'=>'Selectionner un produit']);?>
    </div>  
    <div class="col-sm-1">
      <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'id'=>'ajoutProduit', 'class' => 'btn btn-danger btn-flat']) ?>
    </div>
  </div>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="">
        <div class="box-body">
          <table class="table table-hover" id="achats-table">
            <thead>
              <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Qte</th>
                <th>Unité</th>
                <th>Prix</th>
                <th>Total</th>
                <th>Dépôt</th>
                <th></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if ($achat->has('achats_details')) :?>
                <?php for ($key = 0; $key < count($achat->achats_details); $key++) :?>
                    <?php echo $this->element('form_achats_ligne', array('key' => $key, 'achatsdetails'=>$achat->achats_details[$key], 'unites'=> $unites, 'depots'=>$depots, 'typesProduits'=>$typesProduits));?>
                <?php endfor;?>
              <?php endif;?>
            </tbody>
            <tfoot>
              <!--<tr>
                  <td colspan="8"></td>
                  <td class="actions">
                      <a href="#" class="add btn btn-danger btn-xs">Ajouter</a>
                  </td>
              </tr>-->
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
      <?php echo $this->Form->input('ttc', ['id'=>'ttc', 'label'=>false, 'value'=> isset($achat) ? ($achat->tva * $achat->total/100) + $achat->total : '0']);?>
    </div>
  </div>
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-1 control-label">Réglée</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('regle', ['label'=>false, 'options' => ['Oui', 'Non'], 'id'=>'regle', 'empty' => true]);?>
    </div>
    <label class="col-sm-1 control-label">Mode de règlement</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('modes_reglement_id', ['id'=>'mode', 'label'=>false, 'id'=>'modereglement', 'options' => $modesReglements, 'empty' => true]);?>
    </div>
    <div class="col-sm-4"  ></div>
  </div>
  <div class="form-group has-feedback extraspace">
    <div  class="<?=isset($achat)? ($achat->regle == 0)? "hidden" :'' :'hidden'?>" id="versementdiv">
      <label  class="col-sm-1 control-label">Versement</label>
      <div class="col-sm-3">
        <?php 
        $sum = 0; 
          if (isset($dette)){
            if($dette->has('versements')){
              foreach ($dette->versements as $versement) {
                $sum += $versement->montant;
              }
            }
          }?>
        <?php echo $this->Form->input('versement', ['label'=>false, 'value'=> $sum]);?>
      </div>
    </div>
    <div class='<?=isset($achat)? $achat->has("modes_reglement")? $achat->modes_reglement->libelle == "Espèce"? "hidden" : '' : 'hidden' : 'hidden' ?>' id="chequediv">
      <label  class="col-sm-1 control-label">N° chèque</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('cheque', ['label'=>false, 'value'=>isset($cheque)? $cheques->numero : '']);?>
      </div>
    </div>
    <div class="col-sm-4"  ></div>
  </div>
</div>
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>  
<script id="achats-template" type="text/x-underscore-template">
    <?php echo $this->element('form_details_achats');?>
</script>
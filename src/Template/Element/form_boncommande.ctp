<div class="box-body">
  <div class="form-group has-feedback">
    <label class="col-sm-2 control-label ">Fournisseur</label>
    <div class="col-sm-9">
      <?php echo $this->Form->input('fournisseur_id', ['label'=>false, 'options' => $fournisseurs, 'id'=>'fournisseursliste', 'empty' => true]);?>
    </div>
    <div>
      <?php echo $this->Form->button(__('Ajouter'), ['type'=>'button', 'data-toggle'=>'modal' ,'class' => 'btn btn-danger btn-flat', 'data-target'=>'#fournisseurPopup']) ?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label  class="col-sm-2 control-label ">Département</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('departement_id', ['label'=>false, 'options' => $departements, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label class="col-sm-2 control-label ">Date</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datebon', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group has-feedback">
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
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if ($bonsCommande->has('details_bon_commande')) :?>
                <?php for ($key = 0; $key < count($bonsCommande->details_bon_commande); $key++) :?>
                    <?php echo $this->element('form_boncommande_ligne', array('key' => $key, 'bonCommandedetails'=>$bonsCommande->details_bon_commande[$key], 'unites'=> $unites, 'typesProduits'=>$typesProduits));?>
                <?php endfor;?>
              <?php endif;?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
  <div class="form-group has-feedback">
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
      <?php echo $this->Form->input('ttc', ['id'=>'ttc', 'label'=>false, 'value'=> isset($bonsCommande) ? ($bonsCommande->tva * $bonsCommande->total/100) + $bonsCommande->total : '0']);?>
    </div>
  </div>
</div>

<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>  
<script id="bonsCommandes-template" type="text/x-underscore-template">
    <?php echo $this->element('form_boncommande_ligne');?>
</script>
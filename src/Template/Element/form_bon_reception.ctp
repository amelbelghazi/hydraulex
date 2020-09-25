<div class="box-body">
  <div class="form-group has-feedback">
    <label  class="col-sm-2 control-label ">Bon de commande</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('bons_commande_id', ['label'=>false, 'id'=>'boncommande', 'options' => $bonsCommandes, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label  class="col-sm-2 control-label ">Numero de la facture</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('numero', ['label'=>false]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label  class="col-sm-2 control-label ">Date de récéption</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datereception', ['label'=>false, 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label  class="col-sm-2 control-label ">Observation</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('observation', ['label'=>false, 'rows'=>2]);?>
    </div>
  </div>
  <div id="BCContainer"></div>
  <div class="form-group has-feedback">
    <label  class="col-sm-1 control-label">Total</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('total', ['id'=>'totalinput', 'label'=>false, 'value'=> isset($bonsCommande)? $bonsCommande->total : '0']);?>
    </div>
    <label  class="col-sm-1 control-label">TVA</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('tva', ['id'=>'tva', 'label'=>false, 'value'=> isset($bonsCommande)? $bonsCommande->tva : '0']);?>
    </div>
    <label class="col-sm-1 control-label">TTC</label>
    <div class="col-sm-3">
      <?php echo $this->Form->input('ttc', ['id'=>'ttc', 'label'=>false, 'value'=> isset($bonsCommande) ? ($bonsCommande->tva * $bonsCommande->total/100) + $bonsCommande->total : '0']);?>
    </div>
  </div>
  <div class="form-group has-feedback">
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
  <div class="form-group has-feedback">
    <div  class="hidden" id="versementdiv">
      <label  class="col-sm-1 control-label">Versement</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('versement', ['label'=>false, 'value'=> '0']);?>
      </div>
    </div>
    <div class="hidden" id="chequediv">
      <label  class="col-sm-1 control-label">N° chèque</label>
      <div class="col-sm-3">
        <?php echo $this->Form->input('cheque', ['label'=>false, 'value'=>isset($cheque)? $cheques->numero : '']);?>
      </div>
    </div>
    <div class="col-sm-4"  ></div>
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
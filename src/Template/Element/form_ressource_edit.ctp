<div class="box-body">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab">General</a></li>
      <li><a href="#piece" data-toggle="tab">Pièces de rechange</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane"  id="general">
        <div class="form-group has-feedback extraspace">
          <label class="col-sm-1">Etat</label>
          <div class="col-sm-3">
            <?php echo $this->Form->input('types_etats_ressource_id', ['label'=>false, 'empty' => true, 'options'=>$typesEtatsRessource, 'value'=>isset($ressource) && $ressource->has('etats_ressources')? end($ressource->etats_ressources)->TypesEtatsRessource['id'] : '']);?>
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
            <?php echo $this->Form->input('type', ['label'=>false,  'empty'=> true, 'id'=>'typesRessourcesliste', 'options'=>$typesRessources]);?>
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
              <?php if ($ressource->has('pieces_ressources')) :?>
                <?php for ($key = 0; $key < count($ressource->pieces_ressources); $key++) :?>
                    <?php echo $this->element('form_piece', array('key' => $key, 'piece'=>$ressource->pieces_ressources[$key]->piece));?>
                <?php endfor;?>
              <?php endif;?>
            </tbody>
          </table>
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
 <div class="box-body">
  <div class="form-group has-feedback extraspace">
    <label class="col-sm-2">Ressource </label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('ressource_id', ['label'=>false, 'class'=>'form-control select2', 'empty' => true, 'style'=>'width: 100%;']);?>
    </div>
  </div>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="">
          <div class="box-body">
            <table class="table table-hover" id="entretiens-table">
              <thead>
                <tr>
                  <th>Libellé</th>
                  <th>Coût</th>
                  <th></th>
                  <th>Durée</th>
                  <th></th>
                  <th>Période</th>
                  <th><?= __('Actions') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if ($entretiensRessource->has('entretien')) :?>
                  <?php for ($key = 0; $key < count($entretiensRessource->entretien); $key++) :?>
                      <?php echo $this->element('form_entretien', array('key' => $key, 'achatsdetails'=>$achat->achats_details[$key], 'unites'=> $unites, 'depots'=>$depots, 'typesProduits'=>$typesProduits));?>
                  <?php endfor;?>
                <?php endif;?>
              </tbody>
              <tfoot>
                <tr>
                    <td colspan="6"></td>
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
</div>
<!-- /.box-body -->
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-11">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>
<script id="entretiens-template" type="text/x-underscore-template">
    <?php echo $this->element('form_entretien');?>
</script>
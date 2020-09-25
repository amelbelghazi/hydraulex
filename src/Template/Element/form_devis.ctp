<div class="box-body">
    <div class="form-group has-feedback">
      <label for="marche_id" class="col-sm-2 control-label">Intitulé</label>
      <div class="col-sm-10">
        <?php
          echo $this->Form->input('marche_id', ['label'=>false, 'options' => $marches, 'empty' => true]);
        ?>
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
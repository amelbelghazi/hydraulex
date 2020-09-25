<div class="box-body">
  <div class="form-group ">
    <label  class="col-sm-2 control-label ">Intitulé</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('intitule', ['label'=>false,'placeholder'=>'Saisissez l\'intitule de la tache']);  ?>
    </div>
  </div>
  <div class="form-group ">
    <label  class="col-sm-2 control-label ">Date de début</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datedebut', ['label'=>false, 'class'=>'datepicker',  'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group ">
    <label  class="col-sm-2 control-label ">Date de Fin</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datefin', ['label'=>false,'class'=>'datepicker', 'type' => 'text']);?>
    </div>
  </div>
  <div class="form-group ">
    <label  class="col-sm-2 control-label ">Details</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('details', ['label'=>false,'placeholder'=>'Saisissez les détails de la tache', 'rows'=>2]);?>
    </div>
  </div>

  <div class="form-group ">
    <label  class="col-sm-2 control-label ">Status</label>
    <div class="col-sm-10">
      <?php  echo $this->Form->input('types_statu_id', ['label'=>false, 'options'=>$status, 'empty'=>true , 'value'=> isset($task->status)?  end($task->status)->types_status->id :'']);   
      ?>

    </div>
  </div>

  <div class="form-group ">
    <label  class="col-sm-2 control-label ">Personnel</label>
    <div class="col-sm-10">
     
      <?php  echo $this->Form->input('personne_id', ['label'=>false, 'options' => $personne, 'empty'=>true ]);?>
      
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
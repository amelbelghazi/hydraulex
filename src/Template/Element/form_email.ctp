<div class="box-body">
<?php
  echo $this->Form->input('destinataire');
  echo $this->Form->input('expediteur');
  echo $this->Form->input('objet');
  echo $this->Form->input('message');
?>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <?= $this->Form->button(__('Save')) ?>
</div>
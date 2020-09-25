 <section class="content-header">
  <h1>
    Mailbox
    <small>13 new messages</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="<?php echo $this->Url->build(array('controller' => 'emails', 'action' => 'index')); ?>" class="btn btn-primary btn-block margin-bottom">Liste des e-mails</a>
  <div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Dossiers</h3>

      <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body no-padding">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="#"><i class="fa fa-envelope-o"></i> Envoyés</a></li>
        <li><a href="#"><i class="fa fa-file-text-o"></i> Brouillons</a></li>
        <li><a href="#"><i class="fa fa-trash-o"></i> Corbeille</a></li>
      </ul>
    </div>
    <!-- /.box-body -->
  </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ecrire un nouveau message</h3>
        </div>
        <!-- /.box-header -->
         <?= $this->Form->create($email, array('role' => 'form', 'type'=>'file')) ?>
        <div class="box-body">
          <div class="form-group">
            <?= $this->Form->input('destinataire', ['label'=>false, 'placeholder'=>'Destinataire :']);?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('expediteur', ['label'=>false, 'placeholder'=>'Expediteur:']);?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('objet', ['label'=>false, 'placeholder'=>'Objet:']);?>
          </div>
          <div class="form-group">
            <?= $this->Form->input('message', ['style'=>'height: 300px', 'id'=>'compose-textarea', 'label'=>false, 'type'=>'textarea', 'placeholder'=>'Veuillez ecrire votre message ici']);?>
          </div>
          <div class="form-group">
            <div class="btn btn-default btn-file">
              <i class="fa fa-paperclip"></i> Attachment
              <input type="file" name="attachment" id="imageUpload" accept="fichier/png,fichier/jpg, fichier/jpeg, fichier/gif">
            </div>
            <p class="help-block">Max. 32MB</p>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="pull-right">
            <?= $this->Form->button(__('Brouillon', ['type'=>'button', 'class'=>'btn btn-default'])) ?>
            <?= $this->Form->button(__('Envoyer'), ['type'=>'submit', 'class'=>'btn btn-primary']) ?>
          </div>
            <?= $this->Form->button(__('Annuler', ['type'=>'reset', 'class'=>'btn btn-default'])) ?>
        </div>
        <?= $this->Form->end() ?>
        <!-- /.box-footer -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
    <!-- /.content -->

<?php
$this->Html->css('/plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
$this->Html->css('/plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);
$this->Html->css('/plugins/iCheck/flat/blue', ['block' => 'css']);
$this->Html->css('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min', ['block' => 'css']);

$this->Html->script([
  '/plugins/iCheck/icheck.min',
  '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
<?php $this->end(); ?>

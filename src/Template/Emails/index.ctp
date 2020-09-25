<!-- /.content -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Boite de récéption
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="<?php echo $this->Url->build(array('controller' => 'emails', 'action' => 'add')); ?>" class="btn btn-primary btn-block margin-bottom">Ecrire</a>

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
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title col-md-6"">Inbox</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('destinataire'=>'destinataire', 'objet'=>'objet')),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
                <?php echo $this->Form->input('search', array('label'=>false,'class'=>'form-control col-md-2','placeholder'=>'Remplissez pour lancer la recherche','type'=>'text','style'=>'    width: auto;' )); ?>
              <div class="input-group" >
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Recherche') ?></button>
                </span>
              </div>
            </form>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="mailbox-controls">
            <!-- Check all button -->
            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            <div class="pull-right">
              1-50/200
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
              </div>
              <!-- /.btn-group -->
            </div>
            <!-- /.pull-right -->
          </div>
          <div class="table-responsive mailbox-messages">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th></th><th></th>
                  <th><?= $this->Paginator->sort('destinataire') ?></th>
                  <th><?= $this->Paginator->sort('expediteur') ?></th>
                  <th><?= $this->Paginator->sort('objet') ?></th>
                  <th><?= __('Actions') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($emails as $email): ?>
              <tr>
                <td><input type="checkbox"></td>
                <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                <td class="mailbox-name"><?= h($email->destinataire) ?></td>
                <td><?= h($email->expediteur) ?></td>
                <td class="mailbox-subject"><?= h($email->objet) ?>
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">5 mins ago</td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $email->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $email->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
              </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
            <!-- /.table -->
          </div>
          <!-- /.mail-box-messages -->
        </div>
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
  </div>
  <ul class="pagination pagination-sm no-margin pull-right">
      <?php echo $this->Paginator->numbers(); ?>
  </ul>
  <!-- /.row -->
</section>
    <!-- /.content -->

<?php
$this->Html->css('/plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
$this->Html->css('/plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);
$this->Html->css('/plugins/iCheck/flat/blue', ['block' => 'css']);

$this->Html->script([
  '/plugins/iCheck/icheck.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
<?php $this->end(); ?>

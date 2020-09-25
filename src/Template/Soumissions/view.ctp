<section class="content-header">
  <h1>
    <?php echo __('Soumission'); ?>
  </h1> 
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <section class="col-lg-12 connectedSortable">
   
        <div class="box  box-info">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            

            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group has-feedback extraspace">
                      <label for="categories_affaire_id" class="col-sm-3 control-label ">Appels d'offre :</label>
                      <div class="col-sm-9">
                        <?= $soumission->has('affaire') ? $soumission->affaire->intitule : '' ?>
                      </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label for="intitule" class="col-sm-3 control-label ">Soumissionnaire :</label>
                      <div class="col-sm-9">
                       <?= $soumission->has('soumissionnaire') ? $soumission->soumissionnaire->nom : '' ?>
                      </div>
                    </div>
                    
                    <div class="form-group has-feedback extraspace">
                      <label for="maitres_ouvrage_id" class="col-sm-3 control-label ">Delais :</label>
                      <div class="col-sm-9 font-delai">
                       <?= h($soumission->delais).' /Mois' ?>
                      </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label for="wilaya_id" class="col-sm-3 control-label ">Montant :</label>
                      <div class="col-sm-9 font-montant">
                        <?= h(number_format($soumission->montant, 2, '.', ' ').' DA') ?>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php if (!empty($soumission->attributions)): ?>
                    <div class="form-group has-feedback extraspace">
                      <label for="wilaya_id" class="col-sm-3 control-label ">Date d'attribution :</label>
                      <div class="col-sm-9 font-date">
                        <?= h(end($soumission->attributions)->dateattribution) ?>
                      </div>
                    </div>
                    <div class="form-group has-feedback extraspace">
                      <label for="wilaya_id" class="col-sm-3 control-label ">observation :</label>
                      <div class="col-sm-9 ">
                        <?= h(end($soumission->attributions)->observation) ?>
                      </div>
                    </div>
                    <?php endif; ?>
                </div> 
            </div>
           
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    
    </section>
  

<!-- div -->

   
  </div>  
</section>

<?php
$this->Html->css([
    '/plugins/iCheck/flat/blue',
    '/plugins/morris/morris',
    '/plugins/jvectormap/jquery-jvectormap-1.2.2',
    '/plugins/datepicker/datepicker3',
    '/plugins/daterangepicker/daterangepicker',
    '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
  '/plugins/morris/morris.min',
  '/plugins/sparkline/jquery.sparkline.min',
  '/plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  '/plugins/jvectormap/jquery-jvectormap-world-mill-en',
  '/plugins/knob/jquery.knob',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  '/plugins/daterangepicker/daterangepicker',
  '/plugins/datepicker/bootstrap-datepicker',
  '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
  '/js/pages/dashboard',
],
['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
<?php  $this->end(); ?>

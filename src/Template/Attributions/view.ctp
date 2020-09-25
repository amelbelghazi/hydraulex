<section class="content-header">
  <h1>
    <?php echo __('Attribution'); ?>
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
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-info"></i>
                <h3 class="box-title"><?php echo __('Information'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    <div class="extraspace">
                      <label class="col-sm-2 control-label "><?=__('Affaire') ?></label>
                      <div class="col-sm-10">
                        <?= $attribution->has('soumission') ? $attribution->soumission->affaire->intitule : '' ?>
                      </div>
                    </div>
                    <div class="extraspace">
                      <label class="col-sm-2 control-label "><?=__('Soumissionnaire') ?></label>
                      <div class="col-sm-10">
                        <?= $attribution->has('soumission') ? $attribution->soumission->soumissionnaire->nom : '' ?>
                      </div>
                    </div>
                    <div class=" extraspace">
                      <label class="col-sm-2 control-label "><?=__('Délais') ?></label>
                      <div class="col-sm-10">
                        <?= $attribution->has('soumission') ? $attribution->soumission->delais : '' ?>
                      </div>
                    </div>
                    <div class=" extraspace">
                      <label class="col-sm-2 control-label "><?=__('Montant') ?></label>
                      <div class="col-sm-10">
                        <?= $attribution->has('soumission') ? $attribution->soumission->montant : '' ?>
                      </div>
                    </div>
                    <div class="extraspace">
                      <label class="col-sm-2 control-label "><?=__('observation') ?></label>
                      <div class="col-sm-10">
                        <?= h($attribution->observation) ?>
                      </div>
                    </div>
                </dl>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

</section>

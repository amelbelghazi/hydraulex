<section class="content-header">
  <h1>
    <?php echo __('Detailsmarche'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Back'), ['action' => 'index'], ['escape' => false])?>
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
                                                                                                        <dt><?= __('Marche') ?></dt>
                                <dd>
                                    <?= $detailsmarche->has('marche') ? $detailsmarche->marche->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Avenant') ?></dt>
                                <dd>
                                    <?= $detailsmarche->has('avenant') ? $detailsmarche->avenant->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Intitule') ?></dt>
                                        <dd>
                                            <?= h($detailsmarche->intitule) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Delai') ?></dt>
                                        <dd>
                                            <?= h($detailsmarche->delai) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Montant') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsmarche->montant) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsmarche->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datedetails') ?></dt>
                                <dd>
                                    <?= h($detailsmarche->datedetails) ?>
                                </dd>
                                                                                                                                                                                                            
                                            
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

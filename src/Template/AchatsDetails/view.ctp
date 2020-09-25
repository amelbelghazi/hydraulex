<section class="content-header">
  <h1>
    <?php echo __('Achats Detail'); ?>
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
                                                                                                                <dt><?= __('Nom') ?></dt>
                                        <dd>
                                            <?= h($achatsDetail->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Code') ?></dt>
                                        <dd>
                                            <?= h($achatsDetail->code) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Achat') ?></dt>
                                <dd>
                                    <?= $achatsDetail->has('achat') ? $achatsDetail->achat->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Stock') ?></dt>
                                <dd>
                                    <?= $achatsDetail->has('stock') ? $achatsDetail->stock->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($achatsDetail->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datedebutservice') ?></dt>
                                <dd>
                                    <?= h($achatsDetail->datedebutservice) ?>
                                </dd>
                                                                                                                    <dt><?= __('Datedebutcirculation') ?></dt>
                                <dd>
                                    <?= h($achatsDetail->datedebutcirculation) ?>
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

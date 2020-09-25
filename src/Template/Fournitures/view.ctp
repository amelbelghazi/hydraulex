<section class="content-header">
  <h1>
    <?php echo __('Fourniture'); ?>
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
                                                                                                        <dt><?= __('Departement') ?></dt>
                                <dd>
                                    <?= $fourniture->has('departement') ? $fourniture->departement->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Stock') ?></dt>
                                <dd>
                                    <?= $fourniture->has('stock') ? $fourniture->stock->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Observation') ?></dt>
                                        <dd>
                                            <?= h($fourniture->observation) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($fourniture->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($fourniture->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateutilisation') ?></dt>
                                <dd>
                                    <?= h($fourniture->dateutilisation) ?>
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

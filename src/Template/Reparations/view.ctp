<section class="content-header">
  <h1>
    <?php echo __('Reparation'); ?>
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
                                                                                                        <dt><?= __('Panne') ?></dt>
                                <dd>
                                    <?= $reparation->has('panne') ? $reparation->panne->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Garage') ?></dt>
                                <dd>
                                    <?= $reparation->has('garage') ? $reparation->garage->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Cout') ?></dt>
                                <dd>
                                    <?= $this->Number->format($reparation->cout) ?>
                                </dd>
                                                                                                                <dt><?= __('Duree') ?></dt>
                                <dd>
                                    <?= $this->Number->format($reparation->duree) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($reparation->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datereparation') ?></dt>
                                <dd>
                                    <?= h($reparation->datereparation) ?>
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

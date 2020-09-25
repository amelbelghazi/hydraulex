<section class="content-header">
  <h1>
    <?php echo __('Etats Commission'); ?>
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
                                                                                                        <dt><?= __('Commission') ?></dt>
                                <dd>
                                    <?= $etatsCommission->has('commission') ? $etatsCommission->commission->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Etat') ?></dt>
                                <dd>
                                    <?= $etatsCommission->has('etat') ? $etatsCommission->etat->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Cause') ?></dt>
                                        <dd>
                                            <?= h($etatsCommission->cause) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($etatsCommission->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateetat') ?></dt>
                                <dd>
                                    <?= h($etatsCommission->dateetat) ?>
                                </dd>
                                                                                                                                                                                                                            <dt><?= __('Datecommission') ?></dt>
                                <dd>
                                    <?= h($etatsCommission->datecommission) ?>
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

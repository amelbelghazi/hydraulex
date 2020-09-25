<section class="content-header">
  <h1>
    <?php echo __('Remboursements Caution'); ?>
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
                                                                                                        <dt><?= __('Caution') ?></dt>
                                <dd>
                                    <?= $remboursementsCaution->has('caution') ? $remboursementsCaution->caution->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Observation') ?></dt>
                                        <dd>
                                            <?= h($remboursementsCaution->observation) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Montant') ?></dt>
                                <dd>
                                    <?= $this->Number->format($remboursementsCaution->montant) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($remboursementsCaution->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateremboursement') ?></dt>
                                <dd>
                                    <?= h($remboursementsCaution->dateremboursement) ?>
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

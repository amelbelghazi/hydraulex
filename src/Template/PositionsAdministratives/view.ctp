<section class="content-header">
  <h1>
    <?php echo __('Positions Administrative'); ?>
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
                                                                                                        <dt><?= __('Personnel') ?></dt>
                                <dd>
                                    <?= $positionsAdministrative->has('personnel') ? $positionsAdministrative->personnel->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Fonction') ?></dt>
                                <dd>
                                    <?= $positionsAdministrative->has('fonction') ? $positionsAdministrative->fonction->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Departement') ?></dt>
                                <dd>
                                    <?= $positionsAdministrative->has('departement') ? $positionsAdministrative->departement->nom : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($positionsAdministrative->modified_by) ?>
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

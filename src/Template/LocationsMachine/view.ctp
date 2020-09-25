<section class="content-header">
  <h1>
    <?php echo __('Locations Machine'); ?>
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
                                                                                                        <dt><?= __('Machine') ?></dt>
                                <dd>
                                    <?= $locationsMachine->has('machine') ? $locationsMachine->machine->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Locataire') ?></dt>
                                <dd>
                                    <?= $locationsMachine->has('locataire') ? $locationsMachine->locataire->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Cout') ?></dt>
                                <dd>
                                    <?= $this->Number->format($locationsMachine->cout) ?>
                                </dd>
                                                                                                                <dt><?= __('Duree') ?></dt>
                                <dd>
                                    <?= $this->Number->format($locationsMachine->duree) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($locationsMachine->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datelocation') ?></dt>
                                <dd>
                                    <?= h($locationsMachine->datelocation) ?>
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

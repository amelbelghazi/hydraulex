<section class="content-header">
  <h1>
    <?php echo __('Etats Ressource'); ?>
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
                                                                                                                <dt><?= __('Cause') ?></dt>
                                        <dd>
                                            <?= h($etatsRessource->cause) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Ressource') ?></dt>
                                <dd>
                                    <?= $etatsRessource->has('ressource') ? $etatsRessource->ressource->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Types Etats Ressource Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($etatsRessource->types_etats_ressource_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($etatsRessource->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateetat') ?></dt>
                                <dd>
                                    <?= h($etatsRessource->dateetat) ?>
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

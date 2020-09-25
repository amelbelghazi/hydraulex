<section class="content-header">
  <h1>
    <?php echo __('Frais Chantier'); ?>
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
                                                                                                        <dt><?= __('Types Frai') ?></dt>
                                <dd>
                                    <?= $fraisChantier->has('types_frai') ? $fraisChantier->types_frai->libelle : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Chantier') ?></dt>
                                <dd>
                                    <?= $fraisChantier->has('chantier') ? $fraisChantier->chantier->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Observation') ?></dt>
                                        <dd>
                                            <?= h($fraisChantier->observation) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Montant') ?></dt>
                                <dd>
                                    <?= $this->Number->format($fraisChantier->montant) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($fraisChantier->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datefrais') ?></dt>
                                <dd>
                                    <?= h($fraisChantier->datefrais) ?>
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

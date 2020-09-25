<section class="content-header">
  <h1>
    <?php echo __('Gift'); ?>
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
                                                                                                        <dt><?= __('Personne') ?></dt>
                                <dd>
                                    <?= $gift->has('personne') ? $gift->personne->nom_complet : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Types Gift') ?></dt>
                                <dd>
                                    <?= $gift->has('types_gift') ? $gift->types_gift->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Observation') ?></dt>
                                        <dd>
                                            <?= h($gift->observation) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($gift->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Montant') ?></dt>
                                <dd>
                                    <?= $this->Number->format($gift->montant) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datecadeau') ?></dt>
                                <dd>
                                    <?= h($gift->datecadeau) ?>
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

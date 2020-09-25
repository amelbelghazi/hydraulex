<section class="content-header">
  <h1>
    <?php echo __('Details Frais Projet'); ?>
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
                                    <?= $detailsFraisProjet->has('types_frai') ? $detailsFraisProjet->types_frai->libelle : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Frais Projet') ?></dt>
                                <dd>
                                    <?= $detailsFraisProjet->has('frais_projet') ? $detailsFraisProjet->frais_projet->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Montant') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsFraisProjet->montant) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsFraisProjet->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datefrais') ?></dt>
                                <dd>
                                    <?= h($detailsFraisProjet->datefrais) ?>
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

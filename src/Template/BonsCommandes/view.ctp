<section class="content-header">
  <h1>
    <?php echo __('Bons Commande'); ?>
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
                                    <?= $bonsCommande->has('departement') ? $bonsCommande->departement->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Fournisseur') ?></dt>
                                <dd>
                                    <?= $bonsCommande->has('fournisseur') ? $bonsCommande->fournisseur->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Total') ?></dt>
                                <dd>
                                    <?= $this->Number->format($bonsCommande->total) ?>
                                </dd>
                                                                                                                <dt><?= __('Tva') ?></dt>
                                <dd>
                                    <?= $this->Number->format($bonsCommande->tva) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($bonsCommande->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datebon') ?></dt>
                                <dd>
                                    <?= h($bonsCommande->datebon) ?>
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

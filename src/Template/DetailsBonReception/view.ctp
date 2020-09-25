<section class="content-header">
  <h1>
    <?php echo __('Details Bon Reception'); ?>
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
                                                                                                        <dt><?= __('Bons Reception') ?></dt>
                                <dd>
                                    <?= $detailsBonReception->has('bons_reception') ? $detailsBonReception->bons_reception->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Produit') ?></dt>
                                <dd>
                                    <?= $detailsBonReception->has('produit') ? $detailsBonReception->produit->nom : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsBonReception->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Prix') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsBonReception->prix) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsBonReception->modified_by) ?>
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

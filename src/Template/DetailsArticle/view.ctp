<section class="content-header">
  <h1>
    <?php echo __('Details Article'); ?>
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
                                                                                                        <dt><?= __('Article') ?></dt>
                                <dd>
                                    <?= $detailsArticle->has('article') ? $detailsArticle->article->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Unite') ?></dt>
                                <dd>
                                    <?= $detailsArticle->has('unite') ? $detailsArticle->unite->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Soustraitant') ?></dt>
                                <dd>
                                    <?= $detailsArticle->has('soustraitant') ? $detailsArticle->soustraitant->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsArticle->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Prix') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsArticle->prix) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsArticle->modified_by) ?>
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

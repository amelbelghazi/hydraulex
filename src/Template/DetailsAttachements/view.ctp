<section class="content-header">
  <h1>
    <?php echo __('Details Attachement'); ?>
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
                                            
                                            
                                                                                                                                                            <dt><?= __('Attachements Travail Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsAttachement->Attachements_Travail_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Details Article Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsAttachement->details_article_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsAttachement->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsAttachement->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateattachement') ?></dt>
                                <dd>
                                    <?= h($detailsAttachement->dateattachement) ?>
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

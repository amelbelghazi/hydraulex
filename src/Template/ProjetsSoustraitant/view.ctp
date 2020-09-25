<section class="content-header">
  <h1>
    <?php echo __('Projets Soustraitant'); ?>
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
                                                                                                        <dt><?= __('March') ?></dt>
                                <dd>
                                    <?= $projetsSoustraitant->has('march') ? $projetsSoustraitant->march->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Soustraitant') ?></dt>
                                <dd>
                                    <?= $projetsSoustraitant->has('soustraitant') ? $projetsSoustraitant->soustraitant->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Duree') ?></dt>
                                <dd>
                                    <?= $this->Number->format($projetsSoustraitant->duree) ?>
                                </dd>
                                                                                                                <dt><?= __('Montant') ?></dt>
                                <dd>
                                    <?= $this->Number->format($projetsSoustraitant->montant) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($projetsSoustraitant->modified_by) ?>
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

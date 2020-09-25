<section class="content-header">
  <h1>
    <?php echo __('Etatsmarche'); ?>
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
                                                                                                        <dt><?= __('Marche') ?></dt>
                                <dd>
                                    <?= $etatsmarche->has('marche') ? $etatsmarche->marche->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('O D S') ?></dt>
                                <dd>
                                    <?= $etatsmarche->has('o_d_s') ? $etatsmarche->o_d_s->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Etat') ?></dt>
                                <dd>
                                    <?= $etatsmarche->has('etat') ? $etatsmarche->etat->libelle : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($etatsmarche->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateetat') ?></dt>
                                <dd>
                                    <?= h($etatsmarche->dateetat) ?>
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

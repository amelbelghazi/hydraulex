<section class="content-header">
  <h1>
    <?php echo __('Maitres Ouvrage'); ?>
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
                                                                                                                <dt><?= __('Nom') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->adresse) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroFixe') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->numeroFixe) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroPortable') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->numeroPortable) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Fax') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->fax) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nif') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->nif) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nis') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->nis) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nrcf') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->nrcf) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Article') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->article) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Compte') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->compte) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Email') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->email) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Agence') ?></dt>
                                        <dd>
                                            <?= h($maitresOuvrage->agence) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($maitresOuvrage->modified_by) ?>
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

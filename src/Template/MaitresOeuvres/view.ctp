<section class="content-header">
  <h1>
    <?php echo __('Maitres Oeuvre'); ?>
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
                                            <?= h($maitresOeuvre->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->adresse) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroFixe') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->numeroFixe) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroPortable') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->numeroPortable) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Fax') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->fax) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nif') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->nif) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nis') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->nis) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nrcf') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->nrcf) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Article') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->article) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Compte') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->compte) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Email') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->email) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Agence') ?></dt>
                                        <dd>
                                            <?= h($maitresOeuvre->agence) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Create By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($maitresOeuvre->create_by) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($maitresOeuvre->modified_by) ?>
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

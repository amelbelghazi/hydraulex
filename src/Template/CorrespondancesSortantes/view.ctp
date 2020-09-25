<section class="content-header">
  <h1>
    <?php echo __('Courriers Sortante'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
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
                    <dt><?= __('Destinataire') ?></dt>
                        <dd>
                            <?= $correspondancesSortante->has('destinataire') ? $correspondancesSortante->destinataire->nom : '' ?>
                        </dd>             
                    <dt><?= __('Objet') ?></dt>
                        <dd>
                            <?= h($correspondancesSortante->objet) ?>
                        </dd>                                                                          
                    <dt><?= __('Observation') ?></dt>
                        <dd>
                            <?= h($correspondancesSortante->observation) ?>
                        </dd>
                    <dt><?= __('nombredocuments') ?></dt>
                        <dd>
                            <?= $this->Number->format($correspondancesSortante->nombredocuments) ?>
                        </dd>
                    <dt><?= __('Datecorrespondance') ?></dt>
                        <dd>
                            <?= h($correspondancesSortante->datecorrespondance) ?>
                        </dd>
                </dl>

                 <div class="col-md-12"><?php if(!empty($correspondancesSortante->fichier)){ ?>
                                    <?= $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/img/Correspondances/Sortantes/' . $correspondancesSortante->fichier,array('class'=>'text-danger','style'=>'float:right;font-size:15pt;padding:0 5px;','escape'=>false)); ?>
                                    <?php if (preg_match("#jpg#", $correspondancesSortante->fichier) || preg_match("#jpeg#", $correspondancesSortante->fichier) || preg_match("#png#", $correspondancesSortante->fichier)){ ?>
                                      
                                        <?php echo $this->Html->image('Correspondances/Sortantes/'.$correspondancesSortante->fichier, array('class'=>'img-responsive')); ?>
                                    <?php }else{?>
                                        <?php if (preg_match("#pdf#", $correspondancesSortante->fichier)){ ?>
                                            <IFRAME src="http://localhost/hydraulex/img/Correspondances/Sortantes/<?= $correspondancesSortante->fichier; ?>#zoom=80" width="100%" height="1005"></IFRAME>
                                        <?php }else{
                                            echo $correspondancesSortante->objet;
                                        } ?>
                                    <?php } ?>
                                <?php }?>
                            </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- ./col -->
</div>
<!-- div -->

</section>

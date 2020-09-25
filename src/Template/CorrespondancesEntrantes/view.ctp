<section class="content-header">
  <h1>
    <?php echo __('Courriers Arrivée'); ?>
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
                        <dt><?= __('Expediteur') ?></dt>
                        <dd>
                            <?= $correspondancesEntrante->has('expediteur') ? $correspondancesEntrante->expediteur->nom : '' ?>
                        </dd> 
                        <dt><?= __('Objet') ?></dt>     
                        <dd>
                            <?= h($correspondancesEntrante->objet) ?>
                        </dd>
                        <dt><?= __('Observation') ?></dt>     
                        <dd>
                            <?= h($correspondancesEntrante->observation) ?>
                        </dd>
                        <dt><?= __('Date d\'envoi') ?></dt>
                        <dd>
                            <?= h($correspondancesEntrante->dateenvoi) ?>
                        </dd>
                </dl>

                <div class="col-md-12"><?php if(!empty($correspondancesEntrante->fichier)){ ?>
                                    <?= $this->Html->link('<i class="fa fa-download" aria-hidden="true"></i>','/img/Correspondances/Entrantes/' . $correspondancesEntrante->fichier,array('class'=>'text-danger','style'=>'float:right;font-size:15pt;padding:0 5px;','escape'=>false)); ?>
                                    <?php if (preg_match("#jpg#", $correspondancesEntrante->fichier) || preg_match("#jpeg#", $correspondancesEntrante->fichier) || preg_match("#png#", $correspondancesEntrante->fichier)){ ?>
                                      
                                        <?php echo $this->Html->image('Correspondances/Entrantes/'.$correspondancesEntrante->fichier, array('class'=>'img-responsive')); ?>
                                    <?php }else{?>
                                        <?php if (preg_match("#pdf#", $correspondancesEntrante->fichier)){ ?>
                                            <IFRAME src="http://localhost/hydraulex/img/Correspondances/Entrantes/<?= $correspondancesEntrante->fichier; ?>#zoom=80" width="100%" height="1005"></IFRAME>
                                        <?php }else{
                                            echo $correspondancesEntrante->objet;
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

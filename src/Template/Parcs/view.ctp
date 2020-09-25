<section class="content-header">
  <h1>
    <?php echo __('Parc'); ?>
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
                <h3 class="box-title"><?php echo __('Informations'); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt><?= __('Libelle') ?></dt>
                    <dd>
                        <?= h($parc->libelle) ?>
                    </dd>
                    <dt><?= __('Adresse') ?></dt>
                    <dd>
                        <?= h($parc->adresse) ?>
                    </dd>
                    <dt><?= __('Wilaya') ?></dt>
                     <dd>
                        <?= $parc->has('wilaya') ? $parc->wilaya->nom : '' ?>
                    </dd>
                    <dt><?= __('Date d\'exploitation') ?></dt>
                    <dd>
                        <?= h($parc->dateexploitation) ?>
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Responsables Parcs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($parc->responsables_parcs)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Parc Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Responsable Id
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($parc->responsables_parcs as $responsablesParcs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($responsablesParcs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($responsablesParcs->responsable->personnel->personne->nom).' '.h($responsablesParcs->responsable->personnel->personne->prenom) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'ResponsablesParcs', 'action' => 'view', $responsablesParcs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'ResponsablesParcs', 'action' => 'edit', $responsablesParcs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'ResponsablesParcs', 'action' => 'delete', $responsablesParcs->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer l\'enregistrement # {0}?', $responsablesParcs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Gardiens Parcs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($parc->gardiens_parcs)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                     
                                    <th>
                                    Gardien Id
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($parc->gardiens_parcs as $gardiensParcs): ?>
                                <tr>
                                  <td>
                                    <?= h($gardiensParcs->gardien_id) ?>
                                    </td>

                                    <td>
                                    <?= h($gardiensParcs->gardien->personnel->personne->nom).' '.h($gardiensParcs->gardien->personnel->personne->prenom) ?>
                                    </td>
                                                                        
                                    
                                    
                                <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'GardiensParcs', 'action' => 'view', $gardiensParcs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'GardiensParcs', 'action' => 'edit', $gardiensParcs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'GardiensParcs', 'action' => 'delete', $gardiensParcs->id], ['confirm' => __('etes vous sûrs de vouloir supprimer l\'enregistrement # {0}?', $gardiensParcs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Ressources']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($parc->ressources)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Nom
                                    </th>
                                        
                                                                    
                                    <th>
                                    Code
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datedebutservice
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datedebutcirculation
                                    </th>
                                        
                                                                    
                                    <th>
                                    Stock Id
                                    </th>
                                                                                                            
                                    <th>
                                    Types Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Parc Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etats Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Location Id
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($parc->ressources as $ressources): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($ressources->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->code) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->datedebutservice) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->datedebutcirculation) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->stock_id) ?>
                                    </td>
                                                                                                                        
                                    <td>
                                    <?= h($ressources->types_ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->parc_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->etats_ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->location_id) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'Ressources', 'action' => 'view', $ressources->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'Ressources', 'action' => 'edit', $ressources->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Ressources', 'action' => 'delete', $ressources->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer l\'enregistrement # {0}?', $ressources->id), 'class'=>'btn btn-danger btn-xs']) ?>    
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                    
                        </tbody>
                    </table>

                <?php endif; ?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

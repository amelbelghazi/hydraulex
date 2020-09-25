<section class="content-header">
  <h1>
    <?php echo __('Etat'); ?>
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
                                                                                                                <dt><?= __('Libelle') ?></dt>
                                        <dd>
                                            <?= h($etat->libelle) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($etat->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Etats Commision']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($etat->etats_commision)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Commission Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateetat
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etat Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($etat->etats_commision as $etatsCommision): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->commission_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->dateetat) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->etat_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($etatsCommision->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EtatsCommision', 'action' => 'view', $etatsCommision->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EtatsCommision', 'action' => 'edit', $etatsCommision->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EtatsCommision', 'action' => 'delete', $etatsCommision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etatsCommision->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Etats Marche']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($etat->etats_marche)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateetat
                                    </th>
                                        
                                                                    
                                    <th>
                                    ODS Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etat Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($etat->etats_marche as $etatsMarche): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etatsMarche->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsMarche->dateetat) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsMarche->ODS_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsMarche->etat_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($etatsMarche->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EtatsMarche', 'action' => 'view', $etatsMarche->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EtatsMarche', 'action' => 'edit', $etatsMarche->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EtatsMarche', 'action' => 'delete', $etatsMarche->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etatsMarche->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Soumissions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($etat->soumissions)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Soumissionnaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Affaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etat Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datesoumission
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($etat->soumissions as $soumissions): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($soumissions->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->soumissionnaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->affaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->etat_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->datesoumission) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($soumissions->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Soumissions', 'action' => 'view', $soumissions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Soumissions', 'action' => 'edit', $soumissions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Soumissions', 'action' => 'delete', $soumissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $soumissions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Etats Ressource']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($etat->etats_ressource)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cause
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Etat Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateetat
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($etat->etats_ressource as $etatsRessource): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etatsRessource->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsRessource->cause) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsRessource->type_etat_ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsRessource->dateetat) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($etatsRessource->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EtatsRessource', 'action' => 'view', $etatsRessource->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EtatsRessource', 'action' => 'edit', $etatsRessource->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EtatsRessource', 'action' => 'delete', $etatsRessource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etatsRessource->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

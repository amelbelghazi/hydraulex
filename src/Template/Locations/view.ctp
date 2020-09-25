<section class="content-header">
  <h1>
    <?php echo __('Location'); ?>
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
                                                                                                        <dt><?= __('Departement') ?></dt>
                                <dd>
                                    <?= $location->has('departement') ? $location->departement->nom : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Numero') ?></dt>
                                        <dd>
                                            <?= h($location->numero) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Proprietaire') ?></dt>
                                <dd>
                                    <?= $location->has('proprietaire') ? $location->proprietaire->nom : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Regle') ?></dt>
                                        <dd>
                                            <?= h($location->regle) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Modes Reglement') ?></dt>
                                <dd>
                                    <?= $location->has('modes_reglement') ? $location->modes_reglement->libelle : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Total') ?></dt>
                                <dd>
                                    <?= $this->Number->format($location->total) ?>
                                </dd>
                                                                                                                <dt><?= __('Tva') ?></dt>
                                <dd>
                                    <?= $this->Number->format($location->tva) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($location->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datelocation') ?></dt>
                                <dd>
                                    <?= h($location->datelocation) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Locations Details']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($location->locations_details)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Prix
                                    </th>
                                        
                                                                    
                                    <th>
                                    Location Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Duree
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($location->locations_details as $locationsDetails): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->prix) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->location_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($locationsDetails->modified_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->duree) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'LocationsDetails', 'action' => 'view', $locationsDetails->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'LocationsDetails', 'action' => 'edit', $locationsDetails->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LocationsDetails', 'action' => 'delete', $locationsDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationsDetails->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($location->ressources)): ?>

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
                                    Modified By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Ressource Id
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

                            <?php foreach ($location->ressources as $ressources): ?>
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
                                    <?= h($ressources->modified_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->types_ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->etats_ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->location_id) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Ressources', 'action' => 'view', $ressources->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ressources', 'action' => 'edit', $ressources->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ressources', 'action' => 'delete', $ressources->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ressources->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Dettes Locations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($location->dettes_locations)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datedette
                                    </th>
                                        
                                                                    
                                    <th>
                                    Location Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etat
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($location->dettes_locations as $dettesLocations): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($dettesLocations->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($dettesLocations->datedette) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($dettesLocations->location_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($dettesLocations->etat) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($dettesLocations->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DettesLocations', 'action' => 'view', $dettesLocations->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DettesLocations', 'action' => 'edit', $dettesLocations->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DettesLocations', 'action' => 'delete', $dettesLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dettesLocations->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Cheques Locations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($location->cheques_locations)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Numero
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etat
                                    </th>
                                        
                                                                    
                                    <th>
                                    Location Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($location->cheques_locations as $chequesLocations): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($chequesLocations->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chequesLocations->numero) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chequesLocations->etat) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chequesLocations->location_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($chequesLocations->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ChequesLocations', 'action' => 'view', $chequesLocations->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ChequesLocations', 'action' => 'edit', $chequesLocations->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ChequesLocations', 'action' => 'delete', $chequesLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chequesLocations->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

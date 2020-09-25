<section class="content-header">
  <h1>
    <?php echo __('Dettes Location'); ?>
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
                                                                                                        <dt><?= __('Location') ?></dt>
                                <dd>
                                    <?= $dettesLocation->has('location') ? $dettesLocation->location->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Etat') ?></dt>
                                        <dd>
                                            <?= h($dettesLocation->etat) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($dettesLocation->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datedette') ?></dt>
                                <dd>
                                    <?= h($dettesLocation->datedette) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Versements Locations']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($dettesLocation->versements_locations)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateversement
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dettes Location Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($dettesLocation->versements_locations as $versementsLocations): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($versementsLocations->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($versementsLocations->dateversement) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($versementsLocations->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($versementsLocations->dettes_location_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($versementsLocations->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'VersementsLocations', 'action' => 'view', $versementsLocations->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'VersementsLocations', 'action' => 'edit', $versementsLocations->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'VersementsLocations', 'action' => 'delete', $versementsLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $versementsLocations->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

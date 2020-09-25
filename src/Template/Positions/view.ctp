<section class="content-header">
  <h1>
    <?php echo __('Position'); ?>
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
                                                                                                        <dt><?= __('Personnel') ?></dt>
                                <dd>
                                    <?= $position->has('personnel') ? $position->personnel->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($position->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateposition') ?></dt>
                                <dd>
                                    <?= h($position->dateposition) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Positions Administratives']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($position->positions_administratives)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Position Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Fonction Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Departement Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($position->positions_administratives as $positionsAdministratives): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->position_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->fonction_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->departement_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($positionsAdministratives->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PositionsAdministratives', 'action' => 'view', $positionsAdministratives->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PositionsAdministratives', 'action' => 'edit', $positionsAdministratives->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PositionsAdministratives', 'action' => 'delete', $positionsAdministratives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionsAdministratives->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Chantiers']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($position->chantiers)): ?>

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
                                    Marche Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Adresse
                                    </th>
                                        
                                                                    
                                    <th>
                                    Wilaya Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($position->chantiers as $chantiers): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($chantiers->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chantiers->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chantiers->marche_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chantiers->adresse) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($chantiers->wilaya_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($chantiers->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Chantiers', 'action' => 'view', $chantiers->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Chantiers', 'action' => 'edit', $chantiers->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Chantiers', 'action' => 'delete', $chantiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chantiers->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

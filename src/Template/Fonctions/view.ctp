<section class="content-header">
  <h1>
    <?php echo __('Fonction'); ?>
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
                                            <?= h($fonction->nom) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($fonction->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Fonctions Administratives']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($fonction->fonctions_administratives)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Fonction Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($fonction->fonctions_administratives as $fonctionsAdministratives): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($fonctionsAdministratives->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fonctionsAdministratives->fonction_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($fonctionsAdministratives->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'FonctionsAdministratives', 'action' => 'view', $fonctionsAdministratives->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'FonctionsAdministratives', 'action' => 'edit', $fonctionsAdministratives->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FonctionsAdministratives', 'action' => 'delete', $fonctionsAdministratives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fonctionsAdministratives->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Fonctions Chantier']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($fonction->fonctions_chantier)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Fonction Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($fonction->fonctions_chantier as $fonctionsChantier): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($fonctionsChantier->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fonctionsChantier->fonction_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($fonctionsChantier->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'FonctionsChantier', 'action' => 'view', $fonctionsChantier->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'FonctionsChantier', 'action' => 'edit', $fonctionsChantier->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FonctionsChantier', 'action' => 'delete', $fonctionsChantier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fonctionsChantier->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Positions Chantier']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($fonction->positions_chantier)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personnel Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Fonction Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Chantier Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($fonction->positions_chantier as $positionsChantier): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($positionsChantier->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsChantier->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsChantier->fonction_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsChantier->chantier_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($positionsChantier->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PositionsChantier', 'action' => 'view', $positionsChantier->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PositionsChantier', 'action' => 'edit', $positionsChantier->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PositionsChantier', 'action' => 'delete', $positionsChantier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionsChantier->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

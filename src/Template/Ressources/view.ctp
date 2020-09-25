<section class="content-header">
  <h1>
    <?php echo __('Ressource'); ?>
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
                                            <?= h($ressource->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Code') ?></dt>
                                        <dd>
                                            <?= h($ressource->code) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Stock') ?></dt>
                                <dd>
                                    <?= $ressource->has('stock') ? $ressource->stock->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($ressource->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datedebutservice') ?></dt>
                                <dd>
                                    <?= h($ressource->datedebutservice) ?>
                                </dd>
                                                                                                                    <dt><?= __('Datedebutcirculation') ?></dt>
                                <dd>
                                    <?= h($ressource->datedebutcirculation) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Affectations Ressource']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($ressource->affectations_ressource)): ?>

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
                                    Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateaffectation
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($ressource->affectations_ressource as $affectationsRessource): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->dateaffectation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($affectationsRessource->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'AffectationsRessource', 'action' => 'view', $affectationsRessource->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'AffectationsRessource', 'action' => 'edit', $affectationsRessource->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AffectationsRessource', 'action' => 'delete', $affectationsRessource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $affectationsRessource->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Machines']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($ressource->machines)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Proprietaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Marque Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($ressource->machines as $machines): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($machines->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($machines->proprietaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($machines->ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($machines->marque_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($machines->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Materiels']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($ressource->materiels)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ressource Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($ressource->materiels as $materiels): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($materiels->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($materiels->ressource_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($materiels->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Materiels', 'action' => 'view', $materiels->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Materiels', 'action' => 'edit', $materiels->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materiels', 'action' => 'delete', $materiels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materiels->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

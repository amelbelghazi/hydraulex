<section class="content-header">
  <h1>
    <?php echo __('Affectation'); ?>
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
                                                                                                        <dt><?= __('Ressource') ?></dt>
                                <dd>
                                    <?= $affectation->has('ressource') ? $affectation->ressource->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($affectation->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateaffectation') ?></dt>
                                <dd>
                                    <?= h($affectation->dateaffectation) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Affectations Administration']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($affectation->affectations_administration)): ?>

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
                                    Affectation Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Chantier Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Departement Id
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

                            <?php foreach ($affectation->affectations_administration as $affectationsAdministration): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($affectationsAdministration->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsAdministration->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsAdministration->affectation_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsAdministration->chantier_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsAdministration->departement_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsAdministration->dateaffectation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($affectationsAdministration->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'AffectationsAdministration', 'action' => 'view', $affectationsAdministration->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'AffectationsAdministration', 'action' => 'edit', $affectationsAdministration->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AffectationsAdministration', 'action' => 'delete', $affectationsAdministration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $affectationsAdministration->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Affectations Chantier']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($affectation->affectations_chantier)): ?>

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
                                    Affectation Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Chantier Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Departement Id
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

                            <?php foreach ($affectation->affectations_chantier as $affectationsChantier): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($affectationsChantier->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsChantier->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsChantier->affectation_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsChantier->chantier_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsChantier->departement_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsChantier->dateaffectation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($affectationsChantier->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'AffectationsChantier', 'action' => 'view', $affectationsChantier->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'AffectationsChantier', 'action' => 'edit', $affectationsChantier->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AffectationsChantier', 'action' => 'delete', $affectationsChantier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $affectationsChantier->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

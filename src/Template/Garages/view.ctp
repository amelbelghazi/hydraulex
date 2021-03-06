<section class="content-header">
  <h1>
    <?php echo __('Garage'); ?>
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
                                            <?= h($garage->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($garage->adresse) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($garage->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Reparations Machine']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($garage->reparations_machine)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Panne Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Garage Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datereparation
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cout
                                    </th>
                                        
                                                                    
                                    <th>
                                    Duree
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($garage->reparations_machine as $reparationsMachine): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($reparationsMachine->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMachine->panne_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMachine->garage_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMachine->datereparation) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMachine->cout) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMachine->duree) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($reparationsMachine->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ReparationsMachine', 'action' => 'view', $reparationsMachine->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ReparationsMachine', 'action' => 'edit', $reparationsMachine->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReparationsMachine', 'action' => 'delete', $reparationsMachine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reparationsMachine->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

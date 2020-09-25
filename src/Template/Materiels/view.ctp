<section class="content-header">
  <h1>
    <?php echo __('Materiel'); ?>
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
                                    <?= $materiel->has('ressource') ? $materiel->ressource->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($materiel->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Reparations Materiel']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($materiel->reparations_materiel)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Materiel Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Reparateur Id
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

                            <?php foreach ($materiel->reparations_materiel as $reparationsMateriel): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($reparationsMateriel->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMateriel->materiel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMateriel->reparateur_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMateriel->datereparation) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMateriel->cout) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparationsMateriel->duree) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($reparationsMateriel->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ReparationsMateriel', 'action' => 'view', $reparationsMateriel->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ReparationsMateriel', 'action' => 'edit', $reparationsMateriel->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReparationsMateriel', 'action' => 'delete', $reparationsMateriel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reparationsMateriel->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

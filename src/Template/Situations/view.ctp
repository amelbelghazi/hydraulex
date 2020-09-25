<section class="content-header">
  <h1>
    <?php echo __('Situation'); ?>
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
                                                                                                                <dt><?= __('Observation') ?></dt>
                                        <dd>
                                            <?= h($situation->observation) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Attachements Travail Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($situation->Attachements_Travail_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Total') ?></dt>
                                <dd>
                                    <?= $this->Number->format($situation->total) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($situation->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datesituation') ?></dt>
                                <dd>
                                    <?= h($situation->datesituation) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Remboursements Avance']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($situation->remboursements_avance)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateremboursement
                                    </th>
                                        
                                                                    
                                    <th>
                                    Avance Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Situation Id
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($situation->remboursements_avance as $remboursementsAvance): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($remboursementsAvance->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($remboursementsAvance->dateremboursement) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($remboursementsAvance->avance_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($remboursementsAvance->montant) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($remboursementsAvance->modified_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($remboursementsAvance->situation_id) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'RemboursementsAvance', 'action' => 'view', $remboursementsAvance->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'RemboursementsAvance', 'action' => 'edit', $remboursementsAvance->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RemboursementsAvance', 'action' => 'delete', $remboursementsAvance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $remboursementsAvance->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Situations Details']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($situation->situations_details)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Situation Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($situation->situations_details as $situationsDetails): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($situationsDetails->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($situationsDetails->situation_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($situationsDetails->qte) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($situationsDetails->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'SituationsDetails', 'action' => 'view', $situationsDetails->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'SituationsDetails', 'action' => 'edit', $situationsDetails->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SituationsDetails', 'action' => 'delete', $situationsDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $situationsDetails->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

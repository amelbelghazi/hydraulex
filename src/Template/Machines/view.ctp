<section class="content-header">
  <h1>
    <?php echo __('Machine'); ?>
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
                                                                                                        <dt><?= __('Proprietaire') ?></dt>
                                <dd>
                                    <?= $machine->has('proprietaire') ? $machine->proprietaire->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Ressource') ?></dt>
                                <dd>
                                    <?= $machine->has('ressource') ? $machine->ressource->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Marque') ?></dt>
                                <dd>
                                    <?= $machine->has('marque') ? $machine->marque->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($machine->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Entretiens Machine']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($machine->entretiens_machine)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Machine Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Piece Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cout
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($machine->entretiens_machine as $entretiensMachine): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($entretiensMachine->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($entretiensMachine->machine_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($entretiensMachine->piece_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($entretiensMachine->cout) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($entretiensMachine->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EntretiensMachine', 'action' => 'view', $entretiensMachine->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EntretiensMachine', 'action' => 'edit', $entretiensMachine->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EntretiensMachine', 'action' => 'delete', $entretiensMachine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entretiensMachine->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Locations Machine']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($machine->locations_machine)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Machine Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cout
                                    </th>
                                        
                                                                    
                                    <th>
                                    Locataire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datelocation
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

                            <?php foreach ($machine->locations_machine as $locationsMachine): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($locationsMachine->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsMachine->machine_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsMachine->cout) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsMachine->locataire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsMachine->datelocation) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsMachine->duree) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($locationsMachine->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'LocationsMachine', 'action' => 'view', $locationsMachine->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'LocationsMachine', 'action' => 'edit', $locationsMachine->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LocationsMachine', 'action' => 'delete', $locationsMachine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationsMachine->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Pannes']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($machine->pannes)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Machine Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datepanne
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cause
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($machine->pannes as $pannes): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($pannes->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($pannes->machine_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($pannes->datepanne) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($pannes->cause) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($pannes->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Pannes', 'action' => 'view', $pannes->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pannes', 'action' => 'edit', $pannes->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pannes', 'action' => 'delete', $pannes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pannes->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Pieces Machine']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($machine->pieces_machine)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Machine Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Piece Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($machine->pieces_machine as $piecesMachine): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($piecesMachine->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($piecesMachine->machine_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($piecesMachine->piece_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($piecesMachine->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'PiecesMachine', 'action' => 'view', $piecesMachine->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'PiecesMachine', 'action' => 'edit', $piecesMachine->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PiecesMachine', 'action' => 'delete', $piecesMachine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $piecesMachine->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

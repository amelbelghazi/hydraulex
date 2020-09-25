<section class="content-header">
  <h1>
    <?php echo __('Piece'); ?>
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
                                            <?= h($piece->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Ref') ?></dt>
                                        <dd>
                                            <?= h($piece->ref) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Description') ?></dt>
                                        <dd>
                                            <?= h($piece->description) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($piece->modified_by) ?>
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

                <?php if (!empty($piece->entretiens_machine)): ?>

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

                            <?php foreach ($piece->entretiens_machine as $entretiensMachine): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Pieces Machine']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($piece->pieces_machine)): ?>

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

                            <?php foreach ($piece->pieces_machine as $piecesMachine): ?>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Ressources']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($piece->ressources)): ?>

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
                                    Types Ressource Id
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
                                    Parc Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($piece->ressources as $ressources): ?>
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
                                    <?= h($ressources->types_ressource_id) ?>
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
                                    <?= h($ressources->parc_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($ressources->modified_by) ?>
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
</section>

<section class="content-header">
  <h1>
    <?php echo __('Chantier'); ?>
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
                                            <?= h($chantier->nom) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Marche') ?></dt>
                                <dd>
                                    <?= $chantier->has('marche') ? $chantier->marche->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($chantier->adresse) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Wilaya') ?></dt>
                                <dd>
                                    <?= $chantier->has('wilaya') ? $chantier->wilaya->nom : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Etats Chantier') ?></dt>
                                <dd>
                                    <?= $chantier->has('etats_chantier') ? $chantier->etats_chantier->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Responsable') ?></dt>
                                <dd>
                                    <?= $chantier->has('responsable') ? $chantier->responsable->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($chantier->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Frais Chantiers']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($chantier->frais_chantiers)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Frais Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datefrais
                                    </th>
                                        
                                                                    
                                    <th>
                                    Chantier Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Observation
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($chantier->frais_chantiers as $fraisChantiers): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($fraisChantiers->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fraisChantiers->types_frais_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fraisChantiers->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fraisChantiers->datefrais) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fraisChantiers->chantier_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fraisChantiers->observation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($fraisChantiers->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'FraisChantiers', 'action' => 'view', $fraisChantiers->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'FraisChantiers', 'action' => 'edit', $fraisChantiers->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FraisChantiers', 'action' => 'delete', $fraisChantiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fraisChantiers->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($chantier->positions_chantier)): ?>

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

                            <?php foreach ($chantier->positions_chantier as $positionsChantier): ?>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Etats']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($chantier->etats)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Libelle
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($chantier->etats as $etats): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etats->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etats->libelle) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($etats->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Etats', 'action' => 'view', $etats->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Etats', 'action' => 'edit', $etats->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Etats', 'action' => 'delete', $etats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etats->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

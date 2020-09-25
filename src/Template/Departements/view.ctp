<section class="content-header">
  <h1>
    <?php echo __('Departement'); ?>
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
                                            <?= h($departement->nom) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Societe') ?></dt>
                                <dd>
                                    <?= $departement->has('societe') ? $departement->societe->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($departement->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Achats']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($departement->achats)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Departement Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Total
                                    </th>
                                        
                                                                    
                                    <th>
                                    Tva
                                    </th>
                                        
                                                                    
                                    <th>
                                    Fournisseur Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datebon
                                    </th>
                                        
                                                                    
                                    <th>
                                    Regle
                                    </th>
                                        
                                                                    
                                    <th>
                                    Mode Reglement Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($departement->achats as $achats): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($achats->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achats->departement_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achats->total) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achats->tva) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achats->fournisseur_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achats->datebon) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achats->regle) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achats->mode_reglement_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($achats->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Achats', 'action' => 'view', $achats->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Achats', 'action' => 'edit', $achats->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Achats', 'action' => 'delete', $achats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achats->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Bons Commandes']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($departement->bons_commandes)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Departement Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Total
                                    </th>
                                        
                                                                    
                                    <th>
                                    Tva
                                    </th>
                                        
                                                                    
                                    <th>
                                    Fournisseur Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datebon
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($departement->bons_commandes as $bonsCommandes): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($bonsCommandes->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsCommandes->departement_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsCommandes->total) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsCommandes->tva) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsCommandes->fournisseur_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsCommandes->datebon) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($bonsCommandes->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'BonsCommandes', 'action' => 'view', $bonsCommandes->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'BonsCommandes', 'action' => 'edit', $bonsCommandes->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BonsCommandes', 'action' => 'delete', $bonsCommandes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bonsCommandes->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Depenses']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($departement->depenses)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cause
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Depense Id
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

                            <?php foreach ($departement->depenses as $depenses): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($depenses->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($depenses->cause) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($depenses->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($depenses->type_depense_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($depenses->departement_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($depenses->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Depenses', 'action' => 'view', $depenses->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Depenses', 'action' => 'edit', $depenses->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Depenses', 'action' => 'delete', $depenses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $depenses->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Fournitures']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($departement->fournitures)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateutilisation
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Departement Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Stock Id
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

                            <?php foreach ($departement->fournitures as $fournitures): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($fournitures->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fournitures->dateutilisation) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fournitures->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fournitures->departement_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fournitures->stock_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fournitures->observation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($fournitures->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Fournitures', 'action' => 'view', $fournitures->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fournitures', 'action' => 'edit', $fournitures->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fournitures', 'action' => 'delete', $fournitures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fournitures->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Positions Administratives']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($departement->positions_administratives)): ?>

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
                                    Personnel Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Fonction Administrative Id
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

                            <?php foreach ($departement->positions_administratives as $positionsAdministratives): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positionsAdministratives->fonction_administrative_id) ?>
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
</section>

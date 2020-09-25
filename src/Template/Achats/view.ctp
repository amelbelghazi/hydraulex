<section class="content-header">
  <h1>
    <?php echo __('Achat'); ?>
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
                                                                                                        <dt><?= __('Departement') ?></dt>
                                <dd>
                                    <?= $achat->has('departement') ? $achat->departement->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Fournisseur') ?></dt>
                                <dd>
                                    <?= $achat->has('fournisseur') ? $achat->fournisseur->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Regle') ?></dt>
                                        <dd>
                                            <?= h($achat->regle) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Modes Reglement') ?></dt>
                                <dd>
                                    <?= $achat->has('modes_reglement') ? $achat->modes_reglement->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Total') ?></dt>
                                <dd>
                                    <?= $this->Number->format($achat->total) ?>
                                </dd>
                                                                                                                <dt><?= __('Tva') ?></dt>
                                <dd>
                                    <?= $this->Number->format($achat->tva) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($achat->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datebon') ?></dt>
                                <dd>
                                    <?= h($achat->datebon) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Achats Details']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($achat->achats_details)): ?>

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
                                    Achat Id
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
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($achat->achats_details as $achatsDetails): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($achatsDetails->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achatsDetails->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achatsDetails->code) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achatsDetails->achat_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achatsDetails->datedebutservice) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achatsDetails->datedebutcirculation) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($achatsDetails->stock_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($achatsDetails->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'AchatsDetails', 'action' => 'view', $achatsDetails->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'AchatsDetails', 'action' => 'edit', $achatsDetails->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AchatsDetails', 'action' => 'delete', $achatsDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achatsDetails->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Bons Reception']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($achat->bons_reception)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Achat Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datereception
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

                            <?php foreach ($achat->bons_reception as $bonsReception): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($bonsReception->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsReception->achat_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsReception->datereception) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($bonsReception->observation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($bonsReception->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'BonsReception', 'action' => 'view', $bonsReception->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'BonsReception', 'action' => 'edit', $bonsReception->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BonsReception', 'action' => 'delete', $bonsReception->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bonsReception->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Dettes']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($achat->dettes)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datedette
                                    </th>
                                        
                                                                    
                                    <th>
                                    Achat Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etat
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($achat->dettes as $dettes): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($dettes->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($dettes->datedette) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($dettes->achat_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($dettes->etat) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($dettes->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Dettes', 'action' => 'view', $dettes->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Dettes', 'action' => 'edit', $dettes->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dettes', 'action' => 'delete', $dettes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dettes->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

<section class="content-header">
  <h1>
    <?php echo __('Produit'); ?>
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
                                            <?= h($produit->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Code') ?></dt>
                                        <dd>
                                            <?= h($produit->code) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Unite') ?></dt>
                                <dd>
                                    <?= $produit->has('unite') ? $produit->unite->signe : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Types Produit') ?></dt>
                                <dd>
                                    <?= $produit->has('types_produit') ? $produit->types_produit->libelle : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Qtealert') ?></dt>
                                <dd>
                                    <?= $this->Number->format($produit->qtealert) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($produit->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= h($produit->qte) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Details Bon Commande']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($produit->details_bon_commande)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Bon Commande Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Prixachat
                                    </th>
                                        
                                                                    
                                    <th>
                                    Unite Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Produit Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($produit->details_bon_commande as $detailsBonCommande): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->bon_commande_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->prixachat) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->unite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->produit_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($detailsBonCommande->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DetailsBonCommande', 'action' => 'view', $detailsBonCommande->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetailsBonCommande', 'action' => 'edit', $detailsBonCommande->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetailsBonCommande', 'action' => 'delete', $detailsBonCommande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsBonCommande->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Details Bon Reception']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($produit->details_bon_reception)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Bon Reception Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Produit Id
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

                            <?php foreach ($produit->details_bon_reception as $detailsBonReception): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($detailsBonReception->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonReception->bon_reception_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonReception->produit_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonReception->qte) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($detailsBonReception->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DetailsBonReception', 'action' => 'view', $detailsBonReception->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetailsBonReception', 'action' => 'edit', $detailsBonReception->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetailsBonReception', 'action' => 'delete', $detailsBonReception->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsBonReception->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Stocks']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($produit->stocks)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datestock
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Prix
                                    </th>
                                        
                                                                    
                                    <th>
                                    Depot Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Achats Detail Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Produit Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($produit->stocks as $stocks): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($stocks->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($stocks->datestock) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($stocks->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($stocks->prix) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($stocks->depot_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($stocks->achats_detail_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($stocks->produit_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($stocks->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Stocks', 'action' => 'view', $stocks->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stocks', 'action' => 'edit', $stocks->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stocks', 'action' => 'delete', $stocks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stocks->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

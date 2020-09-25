<section class="content-header">
  <h1>
    <?php echo __('Types Produit'); ?>
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
                                                                                                                <dt><?= __('Libelle') ?></dt>
                                        <dd>
                                            <?= h($typesProduit->libelle) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Couleur') ?></dt>
                                        <dd>
                                            <?= h($typesProduit->couleur) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Types Produit Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($typesProduit->types_produit_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($typesProduit->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Types Produits']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($typesProduit->types_produits)): ?>

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
                                    Types Produit Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Couleur
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($typesProduit->types_produits as $typesProduits): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($typesProduits->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($typesProduits->libelle) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($typesProduits->types_produit_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($typesProduits->couleur) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($typesProduits->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'TypesProduits', 'action' => 'view', $typesProduits->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'TypesProduits', 'action' => 'edit', $typesProduits->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TypesProduits', 'action' => 'delete', $typesProduits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typesProduits->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Produits']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($typesProduit->produits)): ?>

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
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Unite Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Categories Produit Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qtealert
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Produit Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($typesProduit->produits as $produits): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($produits->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->code) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->unite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->categories_produit_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->qtealert) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->types_produit_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($produits->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Produits', 'action' => 'view', $produits->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produits', 'action' => 'edit', $produits->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produits', 'action' => 'delete', $produits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produits->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

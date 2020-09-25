<section class="content-header">
  <h1>
    <?php echo __('Stock'); ?>
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
                                                                                                        <dt><?= __('Depot') ?></dt>
                                <dd>
                                    <?= $stock->has('depot') ? $stock->depot->libelle : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Achats Detail') ?></dt>
                                <dd>
                                    <?= $stock->has('achats_detail') ? $stock->achats_detail->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Produit') ?></dt>
                                <dd>
                                    <?= $stock->has('produit') ? $stock->produit->nom : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($stock->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Prix') ?></dt>
                                <dd>
                                    <?= $this->Number->format($stock->prix) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($stock->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datestock') ?></dt>
                                <dd>
                                    <?= h($stock->datestock) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Fournitures']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($stock->fournitures)): ?>

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

                            <?php foreach ($stock->fournitures as $fournitures): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Ressources']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($stock->ressources)): ?>

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

                            <?php foreach ($stock->ressources as $ressources): ?>
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
                                    <?= h($ressources->datedebutservice) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->datedebutcirculation) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($ressources->stock_id) ?>
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

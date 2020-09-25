<section class="content-header">
  <h1>
    <?php echo __('Stocks Location'); ?>
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
                                    <?= $stocksLocation->has('depot') ? $stocksLocation->depot->libelle : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Produit') ?></dt>
                                <dd>
                                    <?= $stocksLocation->has('produit') ? $stocksLocation->produit->nom : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($stocksLocation->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Prix') ?></dt>
                                <dd>
                                    <?= $this->Number->format($stocksLocation->prix) ?>
                                </dd>
                                                                                                                <dt><?= __('Locations Detail Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($stocksLocation->locations_detail_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($stocksLocation->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datestock') ?></dt>
                                <dd>
                                    <?= h($stocksLocation->datestock) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Locations Details']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($stocksLocation->locations_details)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Prix
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Location Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Stocks Location Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($stocksLocation->locations_details as $locationsDetails): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->prix) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->location_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locationsDetails->stocks_location_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($locationsDetails->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'LocationsDetails', 'action' => 'view', $locationsDetails->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'LocationsDetails', 'action' => 'edit', $locationsDetails->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LocationsDetails', 'action' => 'delete', $locationsDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locationsDetails->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

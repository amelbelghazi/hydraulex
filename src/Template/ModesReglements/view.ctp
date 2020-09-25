<section class="content-header">
  <h1>
    <?php echo __('Modes Reglement'); ?>
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
                                            <?= h($modesReglement->libelle) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($modesReglement->modified_by) ?>
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

                <?php if (!empty($modesReglement->achats)): ?>

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
                                    Modes Reglement Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($modesReglement->achats as $achats): ?>
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
                                    <?= h($achats->modes_reglement_id) ?>
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
</section>

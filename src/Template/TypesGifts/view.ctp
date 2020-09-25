<section class="content-header">
  <h1>
    <?php echo __('Types Gift'); ?>
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
                                            <?= h($typesGift->libelle) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Gifts']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($typesGift->gifts)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personne Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Gift Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datecadeau
                                    </th>
                                        
                                                                    
                                    <th>
                                    Observation
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($typesGift->gifts as $gifts): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($gifts->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gifts->personne_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gifts->types_gift_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gifts->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gifts->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gifts->datecadeau) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gifts->observation) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Gifts', 'action' => 'view', $gifts->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Gifts', 'action' => 'edit', $gifts->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Gifts', 'action' => 'delete', $gifts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gifts->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

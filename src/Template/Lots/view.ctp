<section class="content-header">
  <h1>
    <?php echo __('Lot'); ?>
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
                                                                                                        <dt><?= __('Devi') ?></dt>
                                <dd>
                                    <?= $lot->has('devi') ? $lot->devi->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Intitule') ?></dt>
                                        <dd>
                                            <?= h($lot->intitule) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Numero') ?></dt>
                                <dd>
                                    <?= $this->Number->format($lot->numero) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($lot->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Parties']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($lot->parties)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Lot Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Libelle
                                    </th>
                                        
                                                                    
                                    <th>
                                    Numero
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($lot->parties as $parties): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($parties->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parties->lot_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parties->libelle) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parties->numero) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($parties->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Parties', 'action' => 'view', $parties->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parties', 'action' => 'edit', $parties->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parties', 'action' => 'delete', $parties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parties->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

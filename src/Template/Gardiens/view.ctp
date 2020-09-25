<section class="content-header">
  <h1>
    <?php echo __('Gardien'); ?>
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
                                                                                                        <dt><?= __('Personnel') ?></dt>
                                <dd>
                                    <?= $gardien->has('personnel') ? $gardien->personnel->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($gardien->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Parcs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($gardien->parcs)): ?>

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
                                    Adresse
                                    </th>
                                        
                                                                    
                                    <th>
                                    Wilaya Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Responsable Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Gardien Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($gardien->parcs as $parcs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($parcs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parcs->libelle) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parcs->adresse) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parcs->wilaya_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parcs->responsable_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($parcs->gardien_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($parcs->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Parcs', 'action' => 'view', $parcs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parcs', 'action' => 'edit', $parcs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parcs', 'action' => 'delete', $parcs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

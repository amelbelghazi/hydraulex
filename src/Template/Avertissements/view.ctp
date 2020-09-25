<section class="content-header">
  <h1>
    <?php echo __('Avertissement'); ?>
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
                                    <?= $avertissement->has('personnel') ? $avertissement->personnel->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Cause') ?></dt>
                                        <dd>
                                            <?= h($avertissement->cause) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Type  Avertissement Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($avertissement->type__avertissement_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($avertissement->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateavertissement') ?></dt>
                                <dd>
                                    <?= h($avertissement->dateavertissement) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Punitions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($avertissement->punitions)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Avertissement Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Punition Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($avertissement->punitions as $punitions): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($punitions->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($punitions->avertissement_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($punitions->type_punition_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($punitions->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Punitions', 'action' => 'view', $punitions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Punitions', 'action' => 'edit', $punitions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Punitions', 'action' => 'delete', $punitions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punitions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

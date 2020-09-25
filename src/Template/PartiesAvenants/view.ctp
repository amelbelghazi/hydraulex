<section class="content-header">
  <h1>
    <?php echo __('Parties Avenant'); ?>
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
                                                                                                        <dt><?= __('Lots Avenant') ?></dt>
                                <dd>
                                    <?= $partiesAvenant->has('lots_avenant') ? $partiesAvenant->lots_avenant->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Intitule') ?></dt>
                                        <dd>
                                            <?= h($partiesAvenant->intitule) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Numero') ?></dt>
                                <dd>
                                    <?= $this->Number->format($partiesAvenant->numero) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($partiesAvenant->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Articles Avenants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($partiesAvenant->articles_avenants)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Parties Avenant Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Intitule
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

                            <?php foreach ($partiesAvenant->articles_avenants as $articlesAvenants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($articlesAvenants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($articlesAvenants->parties_avenant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($articlesAvenants->intitule) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($articlesAvenants->numero) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($articlesAvenants->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ArticlesAvenants', 'action' => 'view', $articlesAvenants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ArticlesAvenants', 'action' => 'edit', $articlesAvenants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ArticlesAvenants', 'action' => 'delete', $articlesAvenants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesAvenants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

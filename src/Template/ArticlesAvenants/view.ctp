<section class="content-header">
  <h1>
    <?php echo __('Articles Avenant'); ?>
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
                                                                                                        <dt><?= __('Parties Avenant') ?></dt>
                                <dd>
                                    <?= $articlesAvenant->has('parties_avenant') ? $articlesAvenant->parties_avenant->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Intitule') ?></dt>
                                        <dd>
                                            <?= h($articlesAvenant->intitule) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Numero') ?></dt>
                                <dd>
                                    <?= $this->Number->format($articlesAvenant->numero) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($articlesAvenant->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Details Articles Avenants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($articlesAvenant->details_articles_avenants)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Articles Avenant Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Unite Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Prix
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datedetailsavenant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Soustraitant Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($articlesAvenant->details_articles_avenants as $detailsArticlesAvenants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenants->articles_avenant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenants->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenants->unite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenants->prix) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenants->datedetailsavenant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenants->soustraitant_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($detailsArticlesAvenants->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DetailsArticlesAvenants', 'action' => 'view', $detailsArticlesAvenants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetailsArticlesAvenants', 'action' => 'edit', $detailsArticlesAvenants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetailsArticlesAvenants', 'action' => 'delete', $detailsArticlesAvenants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsArticlesAvenants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

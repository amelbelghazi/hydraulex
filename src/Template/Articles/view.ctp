<section class="content-header">
  <h1>
    <?php echo __('Article'); ?>
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
                                                                                                        <dt><?= __('Party') ?></dt>
                                <dd>
                                    <?= $article->has('party') ? $article->party->id : '' ?>
                                </dd>
                                                                                                                        <dt><?= __('Libelle') ?></dt>
                                        <dd>
                                            <?= h($article->libelle) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Numero') ?></dt>
                                <dd>
                                    <?= $this->Number->format($article->numero) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($article->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Details Article']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($article->details_article)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Article Id
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
                                    Soustraitant Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($article->details_article as $detailsArticle): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($detailsArticle->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticle->article_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticle->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticle->unite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticle->prix) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticle->soustraitant_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($detailsArticle->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DetailsArticle', 'action' => 'view', $detailsArticle->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetailsArticle', 'action' => 'edit', $detailsArticle->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetailsArticle', 'action' => 'delete', $detailsArticle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsArticle->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

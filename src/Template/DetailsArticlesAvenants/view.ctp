<section class="content-header">
  <h1>
    <?php echo __('Details Articles Avenant'); ?>
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
                                                                                                        <dt><?= __('Articles Avenant') ?></dt>
                                <dd>
                                    <?= $detailsArticlesAvenant->has('articles_avenant') ? $detailsArticlesAvenant->articles_avenant->id : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Unite') ?></dt>
                                <dd>
                                    <?= $detailsArticlesAvenant->has('unite') ? $detailsArticlesAvenant->unite->signe : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Soustraitant') ?></dt>
                                <dd>
                                    <?= $detailsArticlesAvenant->has('soustraitant') ? $detailsArticlesAvenant->soustraitant->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Qte') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsArticlesAvenant->qte) ?>
                                </dd>
                                                                                                                <dt><?= __('Prix') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsArticlesAvenant->prix) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($detailsArticlesAvenant->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datedetailsavenant') ?></dt>
                                <dd>
                                    <?= h($detailsArticlesAvenant->datedetailsavenant) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Attachements Travaux Avenants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($detailsArticlesAvenant->attachements_travaux_avenants)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Details Articles Avenant Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateattachementavenant
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($detailsArticlesAvenant->attachements_travaux_avenants as $attachementsTravauxAvenants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($attachementsTravauxAvenants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($attachementsTravauxAvenants->details_articles_avenant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($attachementsTravauxAvenants->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($attachementsTravauxAvenants->dateattachementavenant) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($attachementsTravauxAvenants->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'AttachementsTravauxAvenants', 'action' => 'view', $attachementsTravauxAvenants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'AttachementsTravauxAvenants', 'action' => 'edit', $attachementsTravauxAvenants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AttachementsTravauxAvenants', 'action' => 'delete', $attachementsTravauxAvenants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachementsTravauxAvenants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

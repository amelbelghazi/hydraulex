<section class="content-header">
  <h1>
    <?php echo __('Soustraitant'); ?>
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
                                                                                                                <dt><?= __('Nom') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->adresse) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroFixe') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->numeroFixe) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroPortable') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->numeroPortable) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Fax') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->fax) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nif') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->nif) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nis') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->nis) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nrcf') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->nrcf) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Article') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->article) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Compte') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->compte) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Email') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->email) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Agence') ?></dt>
                                        <dd>
                                            <?= h($soustraitant->agence) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($soustraitant->modified_by) ?>
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

                <?php if (!empty($soustraitant->details_article)): ?>

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

                            <?php foreach ($soustraitant->details_article as $detailsArticle): ?>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Details Articles Avenant']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($soustraitant->details_articles_avenant)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Article Avenant Id
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

                            <?php foreach ($soustraitant->details_articles_avenant as $detailsArticlesAvenant): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenant->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenant->article_avenant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenant->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenant->unite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenant->prix) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenant->datedetailsavenant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsArticlesAvenant->soustraitant_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($detailsArticlesAvenant->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DetailsArticlesAvenant', 'action' => 'view', $detailsArticlesAvenant->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetailsArticlesAvenant', 'action' => 'edit', $detailsArticlesAvenant->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetailsArticlesAvenant', 'action' => 'delete', $detailsArticlesAvenant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsArticlesAvenant->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Projets Soustraitant']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($soustraitant->projets_soustraitant)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Marche Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Soustraitant Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Duree
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($soustraitant->projets_soustraitant as $projetsSoustraitant): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->marche_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->soustraitant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->duree) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($projetsSoustraitant->montant) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($projetsSoustraitant->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ProjetsSoustraitant', 'action' => 'view', $projetsSoustraitant->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjetsSoustraitant', 'action' => 'edit', $projetsSoustraitant->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjetsSoustraitant', 'action' => 'delete', $projetsSoustraitant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetsSoustraitant->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

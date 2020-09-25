<section class="content-header">
  <h1>
    <?php echo __('Unite'); ?>
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
                                            <?= h($unite->libelle) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Signe') ?></dt>
                                        <dd>
                                            <?= h($unite->signe) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($unite->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Contraintes Soumission']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($unite->contraintes_soumission)): ?>

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
                                    Valeur
                                    </th>
                                        
                                                                    
                                    <th>
                                    Unite Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($unite->contraintes_soumission as $contraintesSoumission): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($contraintesSoumission->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contraintesSoumission->libelle) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contraintesSoumission->valeur) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contraintesSoumission->unite_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($contraintesSoumission->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ContraintesSoumission', 'action' => 'view', $contraintesSoumission->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContraintesSoumission', 'action' => 'edit', $contraintesSoumission->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContraintesSoumission', 'action' => 'delete', $contraintesSoumission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contraintesSoumission->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Details Article']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($unite->details_article)): ?>

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

                            <?php foreach ($unite->details_article as $detailsArticle): ?>
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

                <?php if (!empty($unite->details_articles_avenant)): ?>

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

                            <?php foreach ($unite->details_articles_avenant as $detailsArticlesAvenant): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Details Bon Commande']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($unite->details_bon_commande)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Bon Commande Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Prixachat
                                    </th>
                                        
                                                                    
                                    <th>
                                    Unite Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Produit Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($unite->details_bon_commande as $detailsBonCommande): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->bon_commande_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->prixachat) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->unite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonCommande->produit_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($detailsBonCommande->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'DetailsBonCommande', 'action' => 'view', $detailsBonCommande->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetailsBonCommande', 'action' => 'edit', $detailsBonCommande->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetailsBonCommande', 'action' => 'delete', $detailsBonCommande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsBonCommande->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Produits']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($unite->produits)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Nom
                                    </th>
                                        
                                                                    
                                    <th>
                                    Code
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Unite Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Qtealert
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type Produit Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($unite->produits as $produits): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($produits->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->code) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->unite_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->qtealert) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($produits->type_produit_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($produits->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Produits', 'action' => 'view', $produits->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produits', 'action' => 'edit', $produits->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produits', 'action' => 'delete', $produits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produits->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

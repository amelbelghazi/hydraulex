<section class="content-header">
  <h1>
    <?php echo __('Bons Reception'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
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
                    <dt><?= __('Achat') ?></dt>
                    <dd>
                        <?= $bonsReception->has('achats') ? end($bonsReception->achats)->numero : '' ?>
                    </dd>
                    <dt><?= __('Bons Commande') ?></dt>
                    <dd>
                        <?= $bonsReception->has('bons_commande') ? $bonsReception->bons_commande->numero : '' ?>
                    </dd>
                    <dt><?= __('Observation') ?></dt>
                    <dd>    
                        <?= h($bonsReception->observation) ?>
                     </dd>                                                           
                    <dt><?= __('Datereception') ?></dt>
                    <dd>
                        <?= h($bonsReception->datereception) ?>
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
                    <h3 class="box-title"><?= __('{0}', ['Details Bon Reception']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($bonsReception->details_bon_reception)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>                              
                                <th>
                                Id
                                </th>                             
                                <th>
                                Produit
                                </th>                            
                                <th>
                                Qte
                                </th>                       
                                <th>
                                Prix
                                </th>  
                                <th>
                                Total
                                </th>                                                                 
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>
                            <?php foreach ($bonsReception->details_bon_reception as $detailsBonReception): ?>
                                <tr>                              
                                    <td>
                                    <?= h($detailsBonReception->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= $detailsBonReception->has('produit')? h($detailsBonReception->produit->nom) : '' ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonReception->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($detailsBonReception->prix) ?>
                                    </td>
                                    <td>
                                        <?= h($detailsBonReception->prix * $detailsBonReception->qte) ?>
                                    </td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['controller' => 'DetailsBonReception', 'action' => 'view', $detailsBonReception->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Editer'), ['controller' => 'DetailsBonReception', 'action' => 'edit', $detailsBonReception->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'DetailsBonReception', 'action' => 'delete', $detailsBonReception->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsBonReception->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

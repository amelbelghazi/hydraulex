<section class="content-header">
  <h1>
    <?php echo __('Types Affaire'); ?>
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
                                            <?= h($typesAffaire->libelle) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($typesAffaire->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Affaires']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($typesAffaire->affaires)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Intitule
                                    </th>
                                        
                                                                    
                                    <th>
                                    Categories Affaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Maitres Ouvrage Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Wilaya Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateaffaire
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etat Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Affaire Id
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($typesAffaire->affaires as $affaires): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($affaires->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affaires->intitule) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affaires->categories_affaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affaires->maitres_ouvrage_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affaires->wilaya_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($affaires->modified_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affaires->dateaffaire) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affaires->etat_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affaires->types_affaire_id) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Affaires', 'action' => 'view', $affaires->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Affaires', 'action' => 'edit', $affaires->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Affaires', 'action' => 'delete', $affaires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $affaires->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

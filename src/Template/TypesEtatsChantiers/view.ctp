<section class="content-header">
  <h1>
    <?php echo __('Types Etats Chantier'); ?>
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
                                            <?= h($typesEtatsChantier->libelle) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($typesEtatsChantier->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Etats Chantiers']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($typesEtatsChantier->etats_chantiers)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cause
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Etats Chantier Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateetat
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($typesEtatsChantier->etats_chantiers as $etatsChantiers): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etatsChantiers->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsChantiers->cause) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsChantiers->types_etats_chantier_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsChantiers->dateetat) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($etatsChantiers->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EtatsChantiers', 'action' => 'view', $etatsChantiers->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EtatsChantiers', 'action' => 'edit', $etatsChantiers->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EtatsChantiers', 'action' => 'delete', $etatsChantiers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etatsChantiers->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

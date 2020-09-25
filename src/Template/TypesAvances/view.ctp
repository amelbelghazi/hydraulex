<section class="content-header">
  <h1>
    <?php echo __('Types Avance'); ?>
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
                                            <?= h($typesAvance->libelle) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Pourcentage') ?></dt>
                                <dd>
                                    <?= $this->Number->format($typesAvance->pourcentage) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($typesAvance->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Avances']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($typesAvance->avances)): ?>

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
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Numero
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateremboursement
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateavance
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Avance Id
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($typesAvance->avances as $avances): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($avances->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avances->marche_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avances->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avances->numero) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avances->dateremboursement) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avances->dateavance) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($avances->modified_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avances->types_avance_id) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Avances', 'action' => 'view', $avances->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Avances', 'action' => 'edit', $avances->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Avances', 'action' => 'delete', $avances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $avances->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

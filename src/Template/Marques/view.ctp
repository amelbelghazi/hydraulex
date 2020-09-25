<section class="content-header">
  <h1>
    <?php echo __('Marque'); ?>
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
                                            <?= h($marque->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($marque->adresse) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroFixe') ?></dt>
                                        <dd>
                                            <?= h($marque->numeroFixe) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroPortable') ?></dt>
                                        <dd>
                                            <?= h($marque->numeroPortable) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($marque->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Machines']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($marque->machines)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Proprietaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Marque Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($marque->machines as $machines): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($machines->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($machines->proprietaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($machines->ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($machines->marque_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($machines->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

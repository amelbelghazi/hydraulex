<section class="content-header">
  <h1>
    <?php echo __('Destinataire'); ?>
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
                                            <?= h($destinataire->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($destinataire->adresse) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroFixe') ?></dt>
                                        <dd>
                                            <?= h($destinataire->numeroFixe) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroPortable') ?></dt>
                                        <dd>
                                            <?= h($destinataire->numeroPortable) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($destinataire->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Correspondances Sortantes']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($destinataire->correspondances_sortantes)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datecorrespondance
                                    </th>
                                        
                                                                    
                                    <th>
                                    Nombredocuments
                                    </th>
                                        
                                                                    
                                    <th>
                                    Destinataire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Objet
                                    </th>
                                        
                                                                    
                                    <th>
                                    Observation
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($destinataire->correspondances_sortantes as $correspondancesSortantes): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($correspondancesSortantes->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($correspondancesSortantes->datecorrespondance) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($correspondancesSortantes->nombredocuments) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($correspondancesSortantes->destinataire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($correspondancesSortantes->objet) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($correspondancesSortantes->observation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($correspondancesSortantes->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'CorrespondancesSortantes', 'action' => 'view', $correspondancesSortantes->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'CorrespondancesSortantes', 'action' => 'edit', $correspondancesSortantes->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CorrespondancesSortantes', 'action' => 'delete', $correspondancesSortantes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $correspondancesSortantes->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

<section class="content-header">
  <h1>
    <?php echo __('Etats Contrat'); ?>
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
                                                                                                        <dt><?= __('Types Etats Contrat') ?></dt>
                                <dd>
                                    <?= $etatsContrat->has('types_etats_contrat') ? $etatsContrat->types_etats_contrat->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Contrat Id') ?></dt>
                                <dd>
                                    <?= $this->Number->format($etatsContrat->contrat_id) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($etatsContrat->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Contrats']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($etatsContrat->contrats)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Numero
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateetablissement
                                    </th>
                                        
                                                                    
                                    <th>
                                    Durée
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type
                                    </th>
                                        
                                                                    
                                    <th>
                                    Etats Contrat Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($etatsContrat->contrats as $contrats): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($contrats->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contrats->numero) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contrats->dateetablissement) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contrats->durée) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contrats->type) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contrats->etats_contrat_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($contrats->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Contrats', 'action' => 'view', $contrats->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contrats', 'action' => 'edit', $contrats->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contrats', 'action' => 'delete', $contrats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contrats->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

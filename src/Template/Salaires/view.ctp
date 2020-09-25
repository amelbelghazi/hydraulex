<section class="content-header">
  <h1>
    <?php echo __('Salaire'); ?>
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
                                                                                                        <dt><?= __('Personnel') ?></dt>
                                <dd>
                                    <?= $salaire->has('personnel') ? $salaire->personnel->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Montant') ?></dt>
                                <dd>
                                    <?= $this->Number->format($salaire->montant) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($salaire->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Datesalaire') ?></dt>
                                <dd>
                                    <?= h($salaire->datesalaire) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Paies']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($salaire->paies)): ?>

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
                                    Salaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datepaie
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($salaire->paies as $paies): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($paies->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($paies->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($paies->salaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($paies->datepaie) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($paies->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Paies', 'action' => 'view', $paies->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Paies', 'action' => 'edit', $paies->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Paies', 'action' => 'delete', $paies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paies->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

<section class="content-header">
  <h1>
    <?php echo __('Commission'); ?>
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
                    <dt><?= __('Affaire') ?></dt>
                        <dd>
                            <?= $commission->has('affaire') ? $commission->affaire->intitule : '' ?>
                        </dd>                                                                        
                        <dt><?= __('Datecommission') ?></dt>
                        <dd>
                            <?= h($commission->datecommission) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Etats Commision']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($commission->etats_commision)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>
                                Id
                                </th>                          
                                <th>
                                Commission Id
                                </th>                               
                                <th>
                                Dateetat
                                </th>                           
                                <th>
                                Etat Id
                                </th>                              
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($commission->etats_commision as $etatsCommision): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->commission_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->dateetat) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsCommision->etat_id) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EtatsCommision', 'action' => 'view', $etatsCommision->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EtatsCommision', 'action' => 'edit', $etatsCommision->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EtatsCommision', 'action' => 'delete', $etatsCommision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etatsCommision->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

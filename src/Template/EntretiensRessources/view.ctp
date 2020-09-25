<section class="content-header">
  <h1>
    <?php echo __('Entretiens Ressource'); ?>
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
                                                                                                        <dt><?= __('Ressource') ?></dt>
                                <dd>
                                    <?= $entretiensRessource->has('ressource') ? $entretiensRessource->ressource->nom : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Entretien') ?></dt>
                                <dd>
                                    <?= $entretiensRessource->has('entretien') ? $entretiensRessource->entretien->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($entretiensRessource->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Entretiens Ressources Periodiques']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entretiensRessource->entretiens_ressources_periodiques)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entretiens Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Garage Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateentretien
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entretiensRessource->entretiens_ressources_periodiques as $entretiensRessourcesPeriodiques): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($entretiensRessourcesPeriodiques->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($entretiensRessourcesPeriodiques->entretiens_ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($entretiensRessourcesPeriodiques->garage_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($entretiensRessourcesPeriodiques->dateentretien) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($entretiensRessourcesPeriodiques->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EntretiensRessourcesPeriodiques', 'action' => 'view', $entretiensRessourcesPeriodiques->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EntretiensRessourcesPeriodiques', 'action' => 'edit', $entretiensRessourcesPeriodiques->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EntretiensRessourcesPeriodiques', 'action' => 'delete', $entretiensRessourcesPeriodiques->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entretiensRessourcesPeriodiques->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

<section class="content-header">
  <h1>
    <?php echo __('Contrat'); ?>
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
                                                                                                                <dt><?= __('Type') ?></dt>
                                        <dd>
                                            <?= h($contrat->type) ?>
                                        </dd>
                                                                                                                                                    <dt><?= __('Etats Contrat') ?></dt>
                                <dd>
                                    <?= $contrat->has('etats_contrat') ? $contrat->etats_contrat->id : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Numero') ?></dt>
                                <dd>
                                    <?= $this->Number->format($contrat->numero) ?>
                                </dd>
                                                                                                                <dt><?= __('Durée') ?></dt>
                                <dd>
                                    <?= $this->Number->format($contrat->durée) ?>
                                </dd>
                                                                                                                <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($contrat->modified_by) ?>
                                </dd>
                                                                                                
                                                                                                        <dt><?= __('Dateetablissement') ?></dt>
                                <dd>
                                    <?= h($contrat->dateetablissement) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Contrats Soustraitant']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($contrat->contrats_soustraitant)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Contrat Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Projet Soustraitant Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Objet
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($contrat->contrats_soustraitant as $contratsSoustraitant): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($contratsSoustraitant->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contratsSoustraitant->contrat_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contratsSoustraitant->projet_soustraitant_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contratsSoustraitant->objet) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($contratsSoustraitant->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ContratsSoustraitant', 'action' => 'view', $contratsSoustraitant->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContratsSoustraitant', 'action' => 'edit', $contratsSoustraitant->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContratsSoustraitant', 'action' => 'delete', $contratsSoustraitant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratsSoustraitant->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Personnels']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($contrat->personnels)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personne Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Types Personnel Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($contrat->personnels as $personnels): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($personnels->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($personnels->personne_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($personnels->types_personnel_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($personnels->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Personnels', 'action' => 'view', $personnels->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Personnels', 'action' => 'edit', $personnels->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Personnels', 'action' => 'delete', $personnels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personnels->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Etats']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($contrat->etats)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Libelle
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($contrat->etats as $etats): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etats->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etats->libelle) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($etats->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Etats', 'action' => 'view', $etats->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Etats', 'action' => 'edit', $etats->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Etats', 'action' => 'delete', $etats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etats->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

<section class="content-header">
  <h1>
    <?php echo __('Equipe'); ?>
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
                                            <?= h($equipe->nom) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($equipe->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Equipes Personnel']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($equipe->equipes_personnel)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personnel Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Equipe Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($equipe->equipes_personnel as $equipesPersonnel): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($equipesPersonnel->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($equipesPersonnel->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($equipesPersonnel->equipe_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($equipesPersonnel->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EquipesPersonnel', 'action' => 'view', $equipesPersonnel->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EquipesPersonnel', 'action' => 'edit', $equipesPersonnel->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquipesPersonnel', 'action' => 'delete', $equipesPersonnel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipesPersonnel->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Equipes Soustraitant']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($equipe->equipes_soustraitant)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Equipe Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Projet Soustraitant Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($equipe->equipes_soustraitant as $equipesSoustraitant): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($equipesSoustraitant->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($equipesSoustraitant->equipe_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($equipesSoustraitant->projet_soustraitant_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($equipesSoustraitant->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EquipesSoustraitant', 'action' => 'view', $equipesSoustraitant->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EquipesSoustraitant', 'action' => 'edit', $equipesSoustraitant->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquipesSoustraitant', 'action' => 'delete', $equipesSoustraitant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipesSoustraitant->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Membres Equipe']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($equipe->membres_equipe)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Membre Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Equipe Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($equipe->membres_equipe as $membresEquipe): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($membresEquipe->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($membresEquipe->membre_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($membresEquipe->equipe_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($membresEquipe->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'MembresEquipe', 'action' => 'view', $membresEquipe->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'MembresEquipe', 'action' => 'edit', $membresEquipe->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MembresEquipe', 'action' => 'delete', $membresEquipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membresEquipe->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

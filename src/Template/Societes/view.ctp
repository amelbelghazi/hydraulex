<section class="content-header">
  <h1>
    <?php echo __('Société'); ?>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> ' . __('Retour'), ['action' => 'index'], ['escape' => false])?>
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
                            <?= h($societe->nom) ?>
                        </dd>
                        <dd>
                            <?= h($societe->adresse) ?>
                        </dd>
                        <dd>
                            <?= h($societe->numeroFixe) ?>
                        </dd>
                        <dd>
                            <?= h($societe->numeroPortable) ?>
                        </dd><dd>
                            <?= h($societe->fax) ?>
                        </dd><dd>
                            <?= h($societe->nif) ?>
                        </dd><dd>
                            <?= h($societe->nis) ?>
                        </dd><dd>
                            <?= h($societe->nrcf) ?>
                        </dd><dd>
                            <?= h($societe->article) ?>
                        </dd><dd>
                            <?= h($societe->compte) ?>
                        </dd><dd>
                            <?= h($societe->email) ?>
                        </dd><dd>
                            <?= h($societe->agence) ?>
                        </dd>
                        <dd>
                            <?= $this->Number->format($societe->modified_by) ?>
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
                    <i class="fa fa-share-alt col-md-2"></i>
                    <h3 class="box-title col-md-8"><?= __('Related {0}', ['Departements']) ?></h3>
                    <div class="col-md-1">
                <?= $this->Html->link(__('Ajouter'), ['controller' => 'Departements', 'action' => 'add', $societe->id], ['class'=>'btn btn-info btn-xs']) ?>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <?php if (!empty($societe->departements)): ?>

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
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>
                            <?php foreach ($societe->departements as $departements): ?>
                                <tr>                            
                                    <td>
                                    <?= h($departements->id) ?>
                                    </td>                              
                                    <td>
                                    <?= h($departements->nom) ?>
                                    </td>
                                    <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Departements', 'action' => 'view', $departements->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Departements', 'action' => 'edit', $departements->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Departements', 'action' => 'delete', $departements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departements->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <i class="fa fa-share-alt col-md-2"></i>
                    <h3 class="box-title col-md-8"><?= __('Related {0}', ['Gerants']) ?></h3>
                    <div class="col-md-1">
                <?= $this->Html->link(__('Ajouter'), ['controller' => 'Gerants', 'action' => 'add', $societe->id], ['class'=>'btn btn-info btn-xs']) ?>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <?php if (!empty($societe->gerants)): ?>

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
                                    Societe Id
                                    </th>                               
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>
                            <?php foreach ($societe->gerants as $gerants): ?>
                                <tr>                                
                                    <td>
                                    <?= h($gerants->id) ?>
                                    </td>                                
                                    <td>
                                    <?= h($gerants->personne_id) ?>
                                    </td>                             
                                    <td>
                                    <?= h($gerants->societe_id) ?>
                                    </td> 
                                    <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Gerants', 'action' => 'view', $gerants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Gerants', 'action' => 'edit', $gerants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Gerants', 'action' => 'delete', $gerants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gerants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

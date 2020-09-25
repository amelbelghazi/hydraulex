<section class="content-header">
  <h1>
    <?php echo __('Personne'); ?>
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
                <dd>
                <?= h($personne->nom) ?>
                </dd> 
                <dd>
                    <?= h($personne->prenom) ?>
                </dd>
                <dd>
                    <?= h($personne->adresse) ?>
                 </dd>
                 <dd>
                    <?= h($personne->numero) ?>
                </dd>
                <dd>
                    <?= $personne->has('sexe') ? $personne->sex->id : '' ?>
                 </dd>
                 <dd>
                    <?= $this->Number->format($personne->situations_familiale_id) ?>
                </dd>
                <dd>
                    <?= $this->Number->format($personne->modified_by) ?>
                </dd>
                <dt><?= __('Datedenaissance') ?></dt>
                <dd>
                    <?= h($personne->datedenaissance) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Cadeaux']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personne->cadeaux)): ?>

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
                                    Type Cadeau Id
                                    </th>                          
                                    <th>
                                    Qte
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datecadeau
                                    </th>
                                        
                                                                    
                                    <th>
                                    Observation
                                    </th>
                                        
                                                                                                                                            
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personne->cadeaux as $cadeaux): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($cadeaux->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($cadeaux->personne_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($cadeaux->type_cadeau_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($cadeaux->qte) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($cadeaux->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($cadeaux->datecadeau) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($cadeaux->observation) ?>
                                    </td>
                                                                                                            
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Cadeaux', 'action' => 'view', $cadeaux->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cadeaux', 'action' => 'edit', $cadeaux->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cadeaux', 'action' => 'delete', $cadeaux->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cadeaux->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Membres']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personne->membres)): ?>

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
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personne->membres as $membres): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($membres->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($membres->personne_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($membres->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Membres', 'action' => 'view', $membres->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Membres', 'action' => 'edit', $membres->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Membres', 'action' => 'delete', $membres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membres->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($personne->personnels)): ?>

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

                            <?php foreach ($personne->personnels as $personnels): ?>
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
</section>

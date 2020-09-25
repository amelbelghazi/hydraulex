<section class="content-header">
  <h1>
    <?php echo __('Personnel'); ?>
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
                                                                                                        <dt><?= __('Personne') ?></dt>
                                <dd>
                                    <?= $personnel->has('personne') ? $personnel->personne->nom_complet : '' ?>
                                </dd>
                                                                                                                <dt><?= __('Types Personnel') ?></dt>
                                <dd>
                                    <?= $personnel->has('types_personnel') ? $personnel->types_personnel->libellé : '' ?>
                                </dd>
                                                                                                
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($personnel->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Affectations Ressource']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->affectations_ressource)): ?>

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
                                    Ressource Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateaffectation
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->affectations_ressource as $affectationsRessource): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->ressource_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($affectationsRessource->dateaffectation) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($affectationsRessource->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'AffectationsRessource', 'action' => 'view', $affectationsRessource->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'AffectationsRessource', 'action' => 'edit', $affectationsRessource->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AffectationsRessource', 'action' => 'delete', $affectationsRessource->id], ['confirm' => __('Are you sure you want to delete # {0}?', $affectationsRessource->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Avertissements']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->avertissements)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Dateavertissement
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personnel Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cause
                                    </th>
                                        
                                                                    
                                    <th>
                                    Type  Avertissement Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->avertissements as $avertissements): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($avertissements->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avertissements->dateavertissement) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avertissements->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avertissements->cause) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($avertissements->type__avertissement_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($avertissements->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Avertissements', 'action' => 'view', $avertissements->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Avertissements', 'action' => 'edit', $avertissements->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Avertissements', 'action' => 'delete', $avertissements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $avertissements->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Equipes Personnel']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->equipes_personnel)): ?>

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

                            <?php foreach ($personnel->equipes_personnel as $equipesPersonnel): ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Etats Personnel']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->etats_personnel)): ?>

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
                                    Dateetat
                                    </th>
                                        
                                                                    
                                    <th>
                                    Cause
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->etats_personnel as $etatsPersonnel): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($etatsPersonnel->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsPersonnel->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsPersonnel->dateetat) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($etatsPersonnel->cause) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($etatsPersonnel->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'EtatsPersonnel', 'action' => 'view', $etatsPersonnel->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'EtatsPersonnel', 'action' => 'edit', $etatsPersonnel->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EtatsPersonnel', 'action' => 'delete', $etatsPersonnel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etatsPersonnel->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Formations Personnel']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->formations_personnel)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Formation Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personnel Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->formations_personnel as $formationsPersonnel): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($formationsPersonnel->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($formationsPersonnel->formation_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($formationsPersonnel->personnel_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($formationsPersonnel->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'FormationsPersonnel', 'action' => 'view', $formationsPersonnel->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'FormationsPersonnel', 'action' => 'edit', $formationsPersonnel->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FormationsPersonnel', 'action' => 'delete', $formationsPersonnel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formationsPersonnel->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Gerants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->gerants)): ?>

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
                                    Societe Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Create By
                                    </th>
                                        
                                                                    
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->gerants as $gerants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($gerants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gerants->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gerants->societe_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($gerants->create_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gerants->modified_by) ?>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-share-alt"></i>
                    <h3 class="box-title"><?= __('Related {0}', ['Salaires']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->salaires)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Datesalaire
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personnel Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->salaires as $salaires): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($salaires->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($salaires->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($salaires->datesalaire) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($salaires->personnel_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($salaires->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Salaires', 'action' => 'view', $salaires->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Salaires', 'action' => 'edit', $salaires->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Salaires', 'action' => 'delete', $salaires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salaires->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Positions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->positions)): ?>

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
                                    Dateposition
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->positions as $positions): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($positions->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positions->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($positions->dateposition) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($positions->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Positions', 'action' => 'view', $positions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Positions', 'action' => 'edit', $positions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Positions', 'action' => 'delete', $positions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Responsables']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->responsables)): ?>

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
                                    Chantier Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->responsables as $responsables): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($responsables->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($responsables->personnel_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($responsables->chantier_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($responsables->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Responsables', 'action' => 'view', $responsables->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Responsables', 'action' => 'edit', $responsables->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Responsables', 'action' => 'delete', $responsables->id], ['confirm' => __('Are you sure you want to delete # {0}?', $responsables->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Users']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->users)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Username
                                    </th>
                                        
                                                                    
                                    <th>
                                    Email
                                    </th>
                                        
                                                                    
                                    <th>
                                    Password
                                    </th>
                                        
                                                                    
                                    <th>
                                    Role Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Societe Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Personnel Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Photo
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->users as $users): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($users->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->username) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->email) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->password) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->role_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->societe_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($users->personnel_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($users->photo) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Gardiens']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->gardiens)): ?>

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
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->gardiens as $gardiens): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($gardiens->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gardiens->personnel_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($gardiens->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Gardiens', 'action' => 'view', $gardiens->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Gardiens', 'action' => 'edit', $gardiens->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Gardiens', 'action' => 'delete', $gardiens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gardiens->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Contrats Personnels']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($personnel->contrats_personnels)): ?>

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
                                    Personnel Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($personnel->contrats_personnels as $contratsPersonnels): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($contratsPersonnels->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contratsPersonnels->contrat_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($contratsPersonnels->personnel_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($contratsPersonnels->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'ContratsPersonnels', 'action' => 'view', $contratsPersonnels->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContratsPersonnels', 'action' => 'edit', $contratsPersonnels->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContratsPersonnels', 'action' => 'delete', $contratsPersonnels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratsPersonnels->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

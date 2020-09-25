<section class="content-header">
  <h1>
    <?php echo __('Entreprise'); ?>
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
                                            <?= h($entreprise->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($entreprise->adresse) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroFixe') ?></dt>
                                        <dd>
                                            <?= h($entreprise->numeroFixe) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroPortable') ?></dt>
                                        <dd>
                                            <?= h($entreprise->numeroPortable) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Fax') ?></dt>
                                        <dd>
                                            <?= h($entreprise->fax) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nif') ?></dt>
                                        <dd>
                                            <?= h($entreprise->nif) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nis') ?></dt>
                                        <dd>
                                            <?= h($entreprise->nis) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nrcf') ?></dt>
                                        <dd>
                                            <?= h($entreprise->nrcf) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Article') ?></dt>
                                        <dd>
                                            <?= h($entreprise->article) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Compte') ?></dt>
                                        <dd>
                                            <?= h($entreprise->compte) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Email') ?></dt>
                                        <dd>
                                            <?= h($entreprise->email) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Agence') ?></dt>
                                        <dd>
                                            <?= h($entreprise->agence) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($entreprise->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Destinataires']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->destinataires)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->destinataires as $destinataires): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($destinataires->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($destinataires->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($destinataires->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Destinataires', 'action' => 'view', $destinataires->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Destinataires', 'action' => 'edit', $destinataires->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Destinataires', 'action' => 'delete', $destinataires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $destinataires->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Expediteurs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->expediteurs)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->expediteurs as $expediteurs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($expediteurs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($expediteurs->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($expediteurs->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Expediteurs', 'action' => 'view', $expediteurs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Expediteurs', 'action' => 'edit', $expediteurs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Expediteurs', 'action' => 'delete', $expediteurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expediteurs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Fournisseurs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->fournisseurs)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->fournisseurs as $fournisseurs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($fournisseurs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($fournisseurs->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($fournisseurs->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Fournisseurs', 'action' => 'view', $fournisseurs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fournisseurs', 'action' => 'edit', $fournisseurs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fournisseurs', 'action' => 'delete', $fournisseurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fournisseurs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

                <?php if (!empty($entreprise->gerants)): ?>

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
                                    Entreprise Id
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

                            <?php foreach ($entreprise->gerants as $gerants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($gerants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gerants->personne_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($gerants->entreprise_id) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Locataires']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->locataires)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->locataires as $locataires): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($locataires->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($locataires->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($locataires->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Locataires', 'action' => 'view', $locataires->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locataires', 'action' => 'edit', $locataires->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locataires', 'action' => 'delete', $locataires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locataires->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Maitres Oeuvres']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->maitres_oeuvres)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
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

                            <?php foreach ($entreprise->maitres_oeuvres as $maitresOeuvres): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($maitresOeuvres->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($maitresOeuvres->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($maitresOeuvres->create_by) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($maitresOeuvres->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'MaitresOeuvres', 'action' => 'view', $maitresOeuvres->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'MaitresOeuvres', 'action' => 'edit', $maitresOeuvres->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MaitresOeuvres', 'action' => 'delete', $maitresOeuvres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maitresOeuvres->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Maitres Ouvrages']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->maitres_ouvrages)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->maitres_ouvrages as $maitresOuvrages): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($maitresOuvrages->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($maitresOuvrages->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($maitresOuvrages->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'MaitresOuvrages', 'action' => 'view', $maitresOuvrages->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'MaitresOuvrages', 'action' => 'edit', $maitresOuvrages->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MaitresOuvrages', 'action' => 'delete', $maitresOuvrages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maitresOuvrages->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Marques']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->marques)): ?>

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
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->marques as $marques): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($marques->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($marques->nom) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($marques->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($marques->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Marques', 'action' => 'view', $marques->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Marques', 'action' => 'edit', $marques->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Marques', 'action' => 'delete', $marques->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marques->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Proprietaires']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->proprietaires)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->proprietaires as $proprietaires): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($proprietaires->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($proprietaires->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($proprietaires->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Proprietaires', 'action' => 'view', $proprietaires->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Proprietaires', 'action' => 'edit', $proprietaires->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Proprietaires', 'action' => 'delete', $proprietaires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proprietaires->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Reparateurs']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->reparateurs)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->reparateurs as $reparateurs): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($reparateurs->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($reparateurs->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($reparateurs->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Reparateurs', 'action' => 'view', $reparateurs->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reparateurs', 'action' => 'edit', $reparateurs->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reparateurs', 'action' => 'delete', $reparateurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reparateurs->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Societes']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->societes)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->societes as $societes): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($societes->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($societes->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($societes->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Societes', 'action' => 'view', $societes->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Societes', 'action' => 'edit', $societes->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Societes', 'action' => 'delete', $societes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $societes->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Soumissionnaires']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->soumissionnaires)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->soumissionnaires as $soumissionnaires): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($soumissionnaires->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissionnaires->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($soumissionnaires->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Soumissionnaires', 'action' => 'view', $soumissionnaires->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Soumissionnaires', 'action' => 'edit', $soumissionnaires->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Soumissionnaires', 'action' => 'delete', $soumissionnaires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $soumissionnaires->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Soustraitants']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($entreprise->soustraitants)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Entreprise Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($entreprise->soustraitants as $soustraitants): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($soustraitants->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soustraitants->entreprise_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($soustraitants->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Soustraitants', 'action' => 'view', $soustraitants->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Soustraitants', 'action' => 'edit', $soustraitants->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Soustraitants', 'action' => 'delete', $soustraitants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $soustraitants->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

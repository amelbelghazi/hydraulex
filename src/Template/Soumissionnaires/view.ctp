<section class="content-header">
  <h1>
    <?php echo __('Soumissionnaire'); ?>
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
                                            <?= h($soumissionnaire->nom) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Adresse') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->adresse) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroFixe') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->numeroFixe) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('NumeroPortable') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->numeroPortable) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Fax') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->fax) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nif') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->nif) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nis') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->nis) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Nrcf') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->nrcf) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Article') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->article) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Compte') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->compte) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Email') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->email) ?>
                                        </dd>
                                                                                                                                                            <dt><?= __('Agence') ?></dt>
                                        <dd>
                                            <?= h($soumissionnaire->agence) ?>
                                        </dd>
                                                                                                                                    
                                            
                                                                                                                                                            <dt><?= __('Modified By') ?></dt>
                                <dd>
                                    <?= $this->Number->format($soumissionnaire->modified_by) ?>
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
                    <h3 class="box-title"><?= __('Related {0}', ['Qualifications']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($soumissionnaire->qualifications)): ?>

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
                                    Soumissionnaire Id
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($soumissionnaire->qualifications as $qualifications): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($qualifications->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($qualifications->libelle) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($qualifications->soumissionnaire_id) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($qualifications->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Qualifications', 'action' => 'view', $qualifications->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Qualifications', 'action' => 'edit', $qualifications->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Qualifications', 'action' => 'delete', $qualifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qualifications->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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
                    <h3 class="box-title"><?= __('Related {0}', ['Soumissions']) ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                <?php if (!empty($soumissionnaire->soumissions)): ?>

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                                                    
                                    <th>
                                    Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Soumissionnaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Affaire Id
                                    </th>
                                        
                                                                    
                                    <th>
                                    Montant
                                    </th>
                                        
                                                                    
                                    <th>
                                    Delais
                                    </th>
                                        
                                                                                                                                            
                                    <th>
                                    Modified By
                                    </th>
                                        
                                                                    
                                <th>
                                    <?php echo __('Actions'); ?>
                                </th>
                            </tr>

                            <?php foreach ($soumissionnaire->soumissions as $soumissions): ?>
                                <tr>
                                                                        
                                    <td>
                                    <?= h($soumissions->id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->soumissionnaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->affaire_id) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->montant) ?>
                                    </td>
                                                                        
                                    <td>
                                    <?= h($soumissions->delais) ?>
                                    </td>
                                                                                                                                                
                                    <td>
                                    <?= h($soumissions->modified_by) ?>
                                    </td>
                                    
                                                                        <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Soumissions', 'action' => 'view', $soumissions->id], ['class'=>'btn btn-info btn-xs']) ?>

                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Soumissions', 'action' => 'edit', $soumissions->id], ['class'=>'btn btn-warning btn-xs']) ?>

                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Soumissions', 'action' => 'delete', $soumissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $soumissions->id), 'class'=>'btn btn-danger btn-xs']) ?>    
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

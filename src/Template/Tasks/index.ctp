<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Taches
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste des') ?> Taches</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Rechercher') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filtrer') ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('personnel') ?></th>
                <th><?= $this->Paginator->sort('intitule') ?></th>
                <th><?= $this->Paginator->sort('Debut') ?></th>
                <th><?= $this->Paginator->sort('Fin') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>

            <?php 
            foreach ($tasks as $task): ?>
              <tr>
                <td><?= $this->Number->format($task->id) ?></td>
                <td><?= $task->has('personne') ? $this->Html->link($task->personne->nom, ['controller' => 'Personnes', 'action' => 'view', $task->personne->id]) : '' ?>
                <?= $task->has('personne') ? $this->Html->link($task->personne->prenom, ['controller' => 'Personnes', 'action' => 'view', $task->personne->id]) : '' ?> </td>
              
                <td><?= h($task->intitule) ?></td>
                <td><?= h($task->datedebut) ?></td>
                <td><?= h($task->datefin) ?></td>  

               
                <td><?= $task->has('status') ? $this->Html->link( end($task->status)->types_status->libelle, ['controller'=>'Status','action'=>'view', end($task->status)->types_status->id]): '' ?> </td>   
               
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $task->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $task->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $task->id], ['confirm' => __('Etes-vous sur de vouloir supprimer l\'enregistrement?'),'class'=>'btn btn-danger btn-xs']) ?>
                  <?= end($task->status)->types_status->libelle=='délais dépassé'  ? $this->Form->postLink(__('délais dépassé'), ['action' => '', $task->id], ['class'=>'btn btn-flat btn-xs bg-primary disabled']): '' ?>
                  <?= end($task->status)->types_status->libelle=='En cours' ? $this->Form->postLink(__('Effectuée'), ['action' => 'changerStatus', $task->id], ['class'=>'btn btn-flat btn-xs bg-olive']):'' ?>
                  <?= end($task->status)->types_status->libelle=='Effectuée' ? $this->Form->postLink(__('Effectuée'), ['action' => '', $task->id], ['class'=>'btn btn-flat btn-xs bg-olive disabled']): '' ?>
                </td>   
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo $this->Paginator->numbers(); ?>
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->

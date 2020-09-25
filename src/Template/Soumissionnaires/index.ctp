<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Soumissionnaires
    <div class="pull-right"><?= $this->Html->link(__('Nouveau'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Liste des') ?> soumissionnaires</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Rechercher') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filter') ?></button>
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
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('qualification') ?></th>
                <th><?= $this->Paginator->sort('wilaya_id', ['label'=>'Wilaya']) ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($soumissionnaires as $soumissionnaire): ?>
                <td><?= $this->Number->format($soumissionnaire->id) ?></td>
                <td><?= h($soumissionnaire->nom) ?></td>
                <td><?= h(end($soumissionnaire->qualifications)->libelle) ?></td>
                <td><?= $soumissionnaire->has('wilaya')? $soumissionnaire->wilaya->nom :'' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $soumissionnaire->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $soumissionnaire->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $soumissionnaire->id], ['confirm' => __('Etes vous sûrs de vouloir supprimer cet enregistrement?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

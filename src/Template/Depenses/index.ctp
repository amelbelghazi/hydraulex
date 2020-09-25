<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dépenses
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box"> 
        <div class="box-header">
          <h3 class="box-title col-md-6""><?= __('Liste des') ?> Depenses</h3>
          <div class="box-tools col-md-6 "  style="position: initial;">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <?php echo $this->Form->select('critere', array('options' => array('cause'=>'cause', 'montant'=>'montant', 'Types_Depense'=>'Types Depense', 'Departement'=>'Departement')),array('class'=>'form-control col-md-2 ','style'=>'    width: auto;')); ?>
              
                <?php echo $this->Form->input('search', array('label'=>false,'class'=>'form-control col-md-2','placeholder'=>'Remplissez pour lancer la recherche','type'=>'text','style'=>'    width: auto;' )); ?>
              <div class="input-group" >
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Recherche') ?></button>
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
                <th><?= $this->Paginator->sort('cause') ?></th>
                <th><?= $this->Paginator->sort('montant') ?></th>
                <th><?= $this->Paginator->sort('Types_Depense') ?></th>
                <th><?= $this->Paginator->sort('Departement') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($depenses as $depense): ?>
              <tr>
                <td><?= $this->Number->format($depense->id) ?></td>
                <td><?= h($depense->cause) ?></td>
                <td><?= $this->Number->format($depense->montant) ?></td>
                <td><?= $depense->has('types_depense') ? $this->Html->link($depense->types_depense->name, ['controller' => 'TypesDepenses', 'action' => 'view', $depense->types_depense->id]) : '' ?></td>
                <td><?= $depense->has('departement') ? $this->Html->link($depense->departement->nom, ['controller' => 'Departements', 'action' => 'view', $depense->departement->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $depense->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $depense->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $depense->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

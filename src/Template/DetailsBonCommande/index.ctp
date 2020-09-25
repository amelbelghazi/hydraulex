<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Details Bon Commande
    <div class="pull-right"><?= $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('List of') ?> Details Bon Commande</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Fill in to start search') ?>">
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
                <th><?= $this->Paginator->sort('bons_commande_id') ?></th>
                <th><?= $this->Paginator->sort('qte') ?></th>
                <th><?= $this->Paginator->sort('prixachat') ?></th>
                <th><?= $this->Paginator->sort('unite_id') ?></th>
                <th><?= $this->Paginator->sort('produit_id') ?></th>
                <th><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($detailsBonCommande as $detailsBonCommande): ?>
              <tr>
                <td><?= $this->Number->format($detailsBonCommande->id) ?></td>
                <td><?= $detailsBonCommande->has('bons_commande') ? $this->Html->link($detailsBonCommande->bons_commande->id, ['controller' => 'BonsCommandes', 'action' => 'view', $detailsBonCommande->bons_commande->id]) : '' ?></td>
                <td><?= $this->Number->format($detailsBonCommande->qte) ?></td>
                <td><?= $this->Number->format($detailsBonCommande->prixachat) ?></td>
                <td><?= $detailsBonCommande->has('unite') ? $this->Html->link($detailsBonCommande->unite->signe, ['controller' => 'Unites', 'action' => 'view', $detailsBonCommande->unite->id]) : '' ?></td>
                <td><?= $detailsBonCommande->has('produit') ? $this->Html->link($detailsBonCommande->produit->nom, ['controller' => 'Produits', 'action' => 'view', $detailsBonCommande->produit->id]) : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__('View'), ['action' => 'view', $detailsBonCommande->id], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailsBonCommande->id], ['class'=>'btn btn-warning btn-xs']) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detailsBonCommande->id], ['confirm' => __('Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
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

<section class="content-header">
  <h1>
    Details Bon Reception
    <small><?= __('Add') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($detailsBonReception, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('bons_reception_id', ['options' => $bonsReceptions, 'empty' => true]);
            echo $this->Form->input('produit_id', ['options' => $produits, 'empty' => true]);
            echo $this->Form->input('qte');
            echo $this->Form->input('prix');
            echo $this->Form->input('modified_by');
          ?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <?= $this->Form->button(__('Save')) ?>
          </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>


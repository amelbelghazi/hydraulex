<section class="content-header">
  <h1>
    Soustraitant
    <small><?= __('Edit') ?></small>
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
        <?= $this->Form->create($soustraitant, array('role' => 'form')) ?>
          <div class="box-body">
          <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('adresse');
            echo $this->Form->input('numeroFixe');
            echo $this->Form->input('numeroPortable');
            echo $this->Form->input('fax');
            echo $this->Form->input('nif');
            echo $this->Form->input('nis');
            echo $this->Form->input('nrcf');
            echo $this->Form->input('article');
            echo $this->Form->input('compte');
            echo $this->Form->input('email');
            echo $this->Form->input('agence');
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


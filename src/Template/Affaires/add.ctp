<section class="content-header">
  <h1>
    Appel d'offre
    <small><?= __('Ajouter') ?></small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-dashboard"></i> '.__('Retour'), ['action' => 'index'], ['escape' => false]) ?>
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
        </div>
          <?= $this->Form->create($affaire, array('role' => 'form')) ?>
            <div class="box-body">
              <?php echo $this->element('form_affaires_add');?>
            </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
  </section>
<!--
  partie maitre ouvrage
-->
<div aria-hidden="false" role="dialog" tabindex="-1" id="MaitreOuvragePopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?php
        echo $this->form->create($maitresOuvrage,array('id'=>'formMaitreOuvrage', 'role'=>'form', 'url'=>array('controller'=>'MaitresOuvrages', 'action' => 'add')));?>
              <?php echo $this->element('form_maitre_ouvrage');?>
      </div>
        <?php
        // Close the modal, output a footer with a 'close' button
        echo $this->form->end();
        ?>
      </div>
    </div>
  </div>
</div>

<!--
  partie catégorie
-->
<div aria-hidden="false" role="dialog" tabindex="-1" id="CategoriePopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?= $this->Form->create($categoriesAffaire, array('id'=>'formCategorie', 'role'=>'form', 'url'=>array('controller'=>'CategoriesAffaires', 'action' => 'add'))) ?>
            <?php echo $this->element('form_categories'); ?>
          <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>

<!--
  partie catégorie
-->
<div aria-hidden="false" role="dialog" tabindex="-1" id="TypeAffairePopup" class="modal leread-modal fade in">
  <div class="modal-dialog">
    <div id="login-content" class="modal-content" >
      <div class="modal-body">
        <?= $this->Form->create($typesAffaire, array('id'=>'formTypeAffaire', 'role'=>'form', 'url'=>array('controller'=>'typesAffaires', 'action' => 'add'))) ?>
            <?php echo $this->element('form_type_affaire'); ?>
          <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>

<?php echo $this->element('popupwindowscript'); ?>

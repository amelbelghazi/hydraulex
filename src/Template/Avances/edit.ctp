<script>
  
  setInterval("montant_avance()", 100);
  function montant_avance()
  {
    var prix = $('#montant-value').val();
    var pourcentagecaution = $('#pourcentage').val();

    var total = (prix*pourcentagecaution)/100; 

    total = total.toFixed(2); 
    $("#montant-avance").val(total);
   
  }

</script>

<section class="content-header">
  <h1>
    Avance
    <small><?= __('Editer') ?></small>
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
          <h3 class="box-title"><?= __('Form') ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($avance, array('role' => 'form','type'=>'file')) ?>
          <?= $this->Form->input('id',array(
                        'type'=>'hidden',
                    ));?>
          <div class="box-body">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#Information" data-toggle="tab">Information</a></li>
                <li><a href="#Fichier" data-toggle="tab">Fichier</a></li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane"  id="Information">
                  <div class="form-group has-feedback extraspace">
                    <label for="details_marche_id" class="col-sm-2 control-label ">Marché </label>
                    <div class="col-sm-7">
                       <?php echo $this->Form->input('details_marche_id', ['id'=> 'marche','type'=> 'text', 'label'=>false, 'value'=>$avance->marche->has('details_marches')? end($avance->marche->details_marches)->intitule:'', 'disabled']);?> 
                    </div>
                    <div class="col-sm-2">
                       <?php echo $this->Form->input('montant-value', ['disabled' ,'id'=> 'montant-value','label'=>false,'value'=>end($avance->marche->details_marches)->montant, 'class' =>'form-control','empty' => true]);?>
                    </div>
                    <div class="col-sm-1" style="    padding: 0px;">
                       <h5>DA</h5>
                    </div>
                  </div>
                  <div class="form-group has-feedback extraspace">
                      <label for="types_avance_id" class="col-sm-2 control-label ">types de avance</label>
                      <div class="col-sm-7">
                        <?php echo $this->Form->input('types_avance_id', ['id'=> 'typesavanceedit','label'=>false,'options' => $typesAvances, 'empty' => true]);?>
                      </div>
                       <div class="col-sm-2">  
                        <?php echo $this->Form->input('pourcentage', ['disabled','id'=> 'pourcentage','label'=>false, 'empty' => true,'style'=>'padding-right: 10px;','value'=>$avance->types_avance->pourcentage]);?>
                      </div>
                      <div class="col-sm-1" style="    padding: 0px;">
                        <h5>%</h5>
                      </div>
                  </div>
                  <div class="form-group has-feedback extraspace">
                    <label for="dateavance" class="col-sm-2 control-label ">Date d'avance </label>
                    <div class="col-sm-9">
                       <?php echo $this->Form->input('dateavance', ['label'=>false,'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?> 
                    </div>
                  </div>
                  <div class="form-group has-feedback extraspace">
                    <label for="Numéro" class="col-sm-2 control-label ">Montant </label>
                    <div class="col-sm-9">
                          <?php echo $this->Form->input('montant', ['label'=>false, 'name'=>'montant','id'=> 'montant-avance', 'class' =>'form-control']);?>
                    </div>
                  </div>
                  <div class="form-group has-feedback extraspace">
                    <label for="dateremboursement" class="col-sm-2 control-label ">Date de remboursement  </label>
                    <div class="col-sm-9">
                       <?php  echo $this->Form->input('dateremboursement', ['label'=>false,'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text'])?> 
                    </div>
                  </div>
                  
                </div>
                <div class="tab-pane"  id="Fichier">
                   <div class="form-group">
                            <label class="col-sm-2 control-label "><?php echo 'Choisir un Fichier'; ?></label>
                            <div class="col-sm-9">
                                <div class="input-group image-preview">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled" > <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                        <!-- image-preview-clear button -->
                                        <button type="button" class="btn btn-default  image-preview-clear" style="display:none;padding: 6px 20px 13px 20px;height: 34px;">
                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                        </button>
                                        <!-- image-preview-input -->
                                        <div class="btn btn-default image-preview-input" style="padding: 6px 20px 13px 20px;height: 34px;">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Browse</span>

                                            <?php echo $this->Form->input('document',array(
                                              'label'=>false,
                                              'type'=>'file',
                                              'id'=>'imageUpload',
                                              'accept'=>'document/png,document/jpg, document/jpeg, document/gif',
                                            )); ?>
                                        </div>
                                        <p>
                                            <?php echo 'Le document est invalide'; ?>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="box-footer" style="border-top: none;">
                  <div class="form-group extraspace">
                    <div class="col-sm-offset-2 col-sm-10">
                  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>

        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</section>

        <?php
$this->Html->css([
    '/plugins/datepicker/datepicker3',
  ],
  ['block' => 'css']);

$this->Html->script([
  '/plugins/input-mask/jquery.inputmask',
  '/plugins/input-mask/jquery.inputmask.date.extensions',
  '/plugins/datepicker/bootstrap-datepicker',
  '/plugins/datepicker/locales/bootstrap-datepicker.pt-BR',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Datemask mm/dd/yyyy
    $(".datepicker")
        .inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
        .datepicker({
            language:'en',
            format: 'dd/mm/yyyy'
        });
  });
</script>
<?php $this->end(); ?>
                <?php
$this->Html->css([
    '/plugins/datepicker/datepicker3',
  ],
  ['block' => 'css']);

$this->Html->script([
  '/plugins/input-mask/jquery.inputmask',
  '/plugins/input-mask/jquery.inputmask.date.extensions',
  '/plugins/datepicker/bootstrap-datepicker',
  '/plugins/datepicker/locales/bootstrap-datepicker.pt-BR',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Datemask mm/dd/yyyy
    $(".datepicker")
        .inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"})
        .datepicker({
            language:'en',
            format: 'dd/mm/yyyy'
        });
  });
</script>
<?php $this->end(); ?>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '#close-preview', function(){
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
            },
            function () {
                $('.image-preview').popover('hide');
            }
        );
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
            content: "There's no image",
            placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
            $('.image-preview').attr("data-content","").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function (){
            var img = $('<img/>', {
                id: 'dynamic',
                width:250,
                height:200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });
</script>
<style type="text/css">

    .image-preview-input {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }
    .image-preview-input input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .image-preview-input-title {
        margin-left:2px;
    }
    .popover{
        position: relative;
        top: 0;
    }
</style>
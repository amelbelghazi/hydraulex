<section class="content-header">
  <h1>
    Commission
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
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($commission, array('role' => 'form','type'=>'file')) ?>
          <div class="box-body">
            <div class="form-group has-feedback extraspace">
              <label for="affaire_id" class="col-sm-2 control-label ">Affaire</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('affaire_id', ['label'=>false, 'options' => $affaires, 'empty' => true,'required'=>'required']); ?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">  
              <label for="datecommision" class="col-sm-2 control-label ">Date de la commission</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('datecommission', ['empty' => true, 'label'=>false, 'default' => '', 'class' => 'datepicker', 'type' => 'text','required'=>'required']);?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 ">Joindre un Fichier</label>
              <div class="col-sm-10">
                  <div class="input-group image-preview">
                    <input type="text" class="form-control image-preview-filename" value=" " disabled>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default  image-preview-clear" style="display:none;padding: 6px 20px 13px 20px;height: 34px;">
                          <span class="glyphicon glyphicon-remove"></span> Clear
                      </button>
                      <div class="btn btn-default image-preview-input" style="padding: 6px 20px 13px 20px;height: 34px;">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <?php echo $this->Form->input('document', ['label'=>false, 'type'=>'file', 'id'=>'imageUpload',
                          'accept'=>'document/png,document/jpg, document/jpeg, document/doc,document/docx, document/pdf, document/xls, document/xlsx',
                        ]); ?>
                      </div>
                      <p>
                          <?php echo 'Le fichier est invalide'; ?>
                      </p>
                    </span>
                  </div>
              </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Ajouter à l'agenda
                </label>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <?= $this->Form->button(__('Enregistrer'), ['class'=>'btn btn-warning btn-flat']) ?>
              </div>
            </div>
          </div>
        <?= $this->Form->end() ?>
      </div> <!-- box primary -->
    </div> <!-- col md 12 -->
  </div> <!-- end of row -->
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
            language:'fr',
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

        
<div class="box-body">
  <div class="form-group has-feedback">
    <label for="affaire_id" class="col-sm-2 control-label ">Affaire</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('affaire_id', ['label'=>false, 'class' =>'form-control', 'name' =>'affaire_id', 'options' => $affaires, 'empty' => true]);?>
    </div>
  </div>
  <div class="form-group has-feedback">
    <label for="datefrais" class="col-sm-2 control-label ">Date</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('datefrais', ['label'=>false, 'class' =>'form-control', 'name' =>'datefrais', 'empty' => true, 'default' => '', 'class' => 'datepicker form-control', 'type' => 'text']);?>
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

  <table class="table table-hover" id="frais-table">
    <thead>
      <tr>
        <th></th>
        <th>Type</th>
        <th></th>
        <th>Montant</th>
        <th>Observation</th> 
        <th><?= __('Actions') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php if ($fraisProjet->has('details_frais_projets')) :?>
        <?php for ($key = 0; $key < count($fraisProjet->details_frais_projets); $key++) :?>
            <?php echo $this->element('form_frais_edit', array('key' => $key, 'detailsfraisprojet'=>$fraisProjet->details_frais_projets[$key]));?>
        <?php endfor;?>
      <?php endif;?>
    </tbody>
    <tfoot>
      <tr>
          <td colspan="4"></td>
          <td class="actions">
              <a href="#" class="add btn btn-danger btn-xs">Ajouter</a>
          </td>
      </tr>
    </tfoot>
  </table>
  <div class="form-group has-feedback">
    <label for="total" class="col-sm-2 control-label">Total</label>
    <div class="col-sm-10">
      <?php echo $this->Form->input('total', ['id'=>'totalfrais', 'label'=>false, 'enabled'=>false]);?>
    </div>
  </div>
</div>
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  <?= $this->Form->button(__('Valider'), ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
  </div>
</div>  
<script id="frais-template" type="text/x-underscore-template">
    <?php echo $this->element('form_frais_edit');?>
</script>

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

        
 
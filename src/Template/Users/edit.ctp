<section class="content-header">
  <h1>
    User
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
        <?= $this->Form->create($user, array('role' => 'form')) ?>
         <?= $this->Form->input('id',array(
                        'type'=>'hidden',
                    ));?>
          <div class="box-body">
          
            <div class="form-group has-feedback extraspace">
              <label for="username" class="col-sm-2 control-label ">Nom d'utilisateur</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('username', ['label'=>false, 'class' =>'form-control', 'name' =>'username', 'placeholder'=>'Saisissez le username']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="email" class="col-sm-2 control-label ">email</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('email', ['label'=>false, 'class' =>'form-control', 'name' =>'email', 'placeholder'=>'Saisissez l\'email']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="password" class="col-sm-2 control-label ">Mot de passe</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('password', ['label'=>false, 'class' =>'form-control', 'name' =>'password', 'placeholder'=>'Saisissez le password']);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="role_id" class="col-sm-2 control-label ">Role</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('role_id', ['label'=>false, 'class' =>'form-control', 'name' =>'role_id', 'placeholder'=>'Saisissez le role', 'options' => $roles, 'empty' => true]);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="societe_id" class="col-sm-2 control-label ">Société</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('societe_id', ['label'=>false, 'class' =>'form-control', 'name' =>'societe_id', 'placeholder'=>'Saisissez la societe', 'options' => $societes, 'empty' => true]);?>
              </div>
            </div>
            <div class="form-group has-feedback extraspace">
              <label for="personne_id" class="col-sm-2 control-label ">Personnel</label>
              <div class="col-sm-10">
                <?php echo $this->Form->input('personne_id', ['label'=>false, 'class' =>'form-control', 'name' =>'personne_id', 'placeholder'=>'Saisissez la personne', 'options' => $personnes, 'empty' => true, 'value'=>$personne!=null ? $personne->id : '']);?>
              </div>
            </div>
          </div>
           <!-- /.box-body -->
         <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <?= $this->Form->button('Modifier', array('name'=>'Modifier','value'=>'info','class' =>'btn btn-primary','type'=>'submit'));?> 
                
              </div>
            </div>
          </div>
      </div>
         
        <?= $this->Form->end() ?>
      </div>
    <div class="col-md-12">
     
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Modifier Photo de profile') ?></h3>
            </div>
            <div class="box-body box-profile">
              <?php echo $this->Form->create($user,array('type'=>'file','role' => 'form','class'=>'form-horizontal','id'=>'defaultForm')) ?>
                    <?= $this->Form->input('id',array(
                        'type'=>'hidden',
                    ));?>

                    <div class="form-group">
                            <label class="col-sm-3 col-md-3 control-label"><?php echo 'Photo'; ?></label>
                            <div class="col-sm-9 col-md-8">
                                <div class="input-group image-preview">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled" style="height: 40px"> <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                        <!-- image-preview-clear button -->
                                        <button type="button" class="btn btn-default  image-preview-clear" style="display:none;">
                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                        </button>
                                        <!-- image-preview-input -->
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Browse</span>

                                            <?php echo $this->Form->input('photo',array(
                                              'label'=>false,
                                              'type'=>'file',
                                              'accept'=>'photo/png,photo/jpg, photo/jpeg, photo/gif',
                                            )); ?>
                                        </div>
                                        <p>
                                            <?php echo 'Le fichier est invalide'; ?>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        </div>

                    
                <?= $this->Form->button('Modifier', array('name'=>'Modifier','value'=>'photo','class' =>'btn btn-primary','type'=>'submit'));?> 
                 <?= $this->Form->end() ?>
            </div>
            
            <!-- /.box-body -->
      </div>
    </div>
    </div>
  </div>
</section>

    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
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

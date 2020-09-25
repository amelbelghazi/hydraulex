<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php echo $this->Html->image('users/'.$user->photo, array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture')); ?>

              <h3 class="profile-username text-center"><?php echo $auth['User']['username'];?></h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Informations</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane"  id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Nom d'utilisateur : </label>
                    <div class="col-sm-9">
                     <label  class=" control-label"><?= h($user->username) ?></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">email : </label>

                    <div class="col-sm-9">
                      <label  class=" control-label"><?= h($user->email) ?></label> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">role : </label>

                    <div class="col-sm-9">
                      <label  class=" control-label"><?= $user->has('role')? h($user->role->libellé) : '' ?></label> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">societe : </label>

                    <div class="col-sm-9">
                      <label  class=" control-label"><?= $user->has('societe') ? h($user->societe->nom) : '' ?></label> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">personnel : </label>

                    <div class="col-sm-9">
                      <label  class=" control-label"><?= $user->has('personnel') ? h($user->personnel->id) : '' ?></label> 
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    
                      <?= $this->Html->link('Modifier', array('controller'=>'users','action'=>'edit',$user->id),array('class' =>'btn btn-primary'));?> 
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

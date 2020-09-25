<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Configure::read('Theme.title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <?php echo $this->Html->css('/bootstrap/css/bootstrap.min'); ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <?php echo $this->Html->css('AdminLTE.min'); ?>
  <!-- iCheck -->
  <?php echo $this->Html->css('/plugins/iCheck/square/blue'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $this->Url->build(array('controller' => 'pages', 'action' => 'display', 'home')); ?>"><?php echo Configure::read('Theme.logo.large'); ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo __('Veuillez vous connecter pour utiliser ...') ?></p>
    <p> <?php echo $this->Flash->render(); ?> </p>
    <p> <?php echo $this->Flash->render('auth'); ?>

<?php echo $this->fetch('content'); ?>

    <?php
    if (Configure::read('Theme.login.show_social')) {
        ?>
        <div class="social-auth-links text-center">
          <p>- <?php echo __('OU') ?> -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> <?php echo __('Se connecter avec Facebook') ?></a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> <?php echo __('Se connecter avec Google+') ?></a>
        </div>
        <?php
    }
    ?>

    <?php
    if (Configure::read('Theme.login.show_remember')) {
        ?>
        <a href="#"><?php echo __('J\'ai oublié mon mot de passe') ?></a><br>
        <?php
    }
    if (Configure::read('Theme.login.show_register')) {
        ?>
        <?= $this->Html->link('<i class="text-center"></i> '.__('S\'inscrire'), ['controller'=>'Users', 'action' => 'register'], ['escape' => false]) ?>
        <?php
    }
    ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<?php echo $this->Html->script('/plugins/jQuery/jquery-2.2.3.min'); ?>
<!-- Bootstrap 3.3.6 -->
<?php echo $this->Html->script('/bootstrap/js/bootstrap.min'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('/plugins/iCheck/icheck.min'); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

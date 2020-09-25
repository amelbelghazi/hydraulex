<?php
use Cake\Core\Configure;

$file = 'src' . DS . 'Template' . DS . 'Element' . DS . 'footer.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.11
    </div>
    <strong>Copyright &copy; 2014-2017 <a href="http://comfex.org">Comfex</a>.</strong> Tous droits réservés.
</footer>
<?php } ?>

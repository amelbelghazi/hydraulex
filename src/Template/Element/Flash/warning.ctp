<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>


<section class="content-header" onclick="this.classList.add('hidden');">
    <div class="alert alert-warning alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-exclamation-triangle"></i> <?= __('Alert') ?>!</h4>
        <?= h($message) ?>
    </div>
</section>

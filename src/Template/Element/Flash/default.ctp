<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<section class="content-header" onclick="this.classList.add('hidden');">
    <div class="alert alert-info alert-dismissible">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-info"></i> <?= __('Alert') ?>!</h4>
        <?= h($message) ?>
    </div>
</section>

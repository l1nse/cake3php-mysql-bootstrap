<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}

?>
<?= $this->Html->charset('utf-8') ?>


<div id="flashMessage" class="message error" role="alert"> <strong>Error! </strong><?= $message ?></div>

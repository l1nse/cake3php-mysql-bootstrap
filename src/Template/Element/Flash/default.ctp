<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="flashMessage" class="message default" role="alert"> <strong>Información - </strong><?= $message ?></div>
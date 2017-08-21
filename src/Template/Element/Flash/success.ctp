<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>



		


<div id="flashMessage" class="message success" role="alert"> <strong>Exito! </strong><?= $message ?></div>
<?php
$theme = $_REQUEST['t'];
setcookie('theme', $theme, time() + 300, '/');
?>
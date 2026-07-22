<?php
require_once __DIR__ . '/point.php';

$A = new Point();
$A->info();
$A->x = 7;
$A->y = 8;
echo $A;
?>
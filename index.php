<?php
$title = "Intro to PHP";
$definition = "PHP - Hypertext Preprocessor";
define("PI", 3.14);
const EPSILON = 2.7;
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <h2><?= $definition; ?></h2>
    <p>Число PI = <?= PI; ?></p>
    <p>Epsilon = <?= EPSILON; ?></p>
    <h2>Типы данных PHP</h2>
    <pre>
<?php
var_dump($title);
var_dump($definition);
var_dump(PI);
var_dump(EPSILON);
?>
    </pre>
    <?= die("die - Прерывает выполнение кода") ?>
</body>
</html>
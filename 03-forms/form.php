<?php
echo '<pre>';
echo <<<INFO
$_GET[last_name]
$_GET[first_name]
$_GET[email]
\n
INFO;

print_r(@$_GET);

foreach($_GET as $value)
{
	echo "$value\t";
}
echo "\n";

echo '</pre>';
?>
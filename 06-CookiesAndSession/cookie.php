<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>Cookie</title>
</head>
<body>
	<h1>Cookie</h1>
	<?php
	define('HOUR', 3600);
	$visitor = false;
	if(isset($_COOKIE['return']))
	{
		$visitor = true;
	} else {
		setcookie('return', '1', time() + 300);
	}
	echo $visitor ? 'Welcome back' : 'Hello';
	?>
</body>
</html>
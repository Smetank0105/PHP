<?php
require_once __DIR__ . '/data.php';
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title><?= $title; ?></title>
	<link href="http://localhost:8080/04-Quitz/css/login.css" rel="stylesheet" />
	<link href="http://localhost:8080/04-Quitz/css/quitz.css" rel="stylesheet" />
</head>
<body>
	<button id="themeToggle">Theme</button>
	<script>
			<?php if (isset($_COOKIE['theme'])) { ?>
			document.body.className = '<?php echo "{$_COOKIE['theme']}" ?>';
			<?php } ?>

		document.getElementById('themeToggle').addEventListener('click', function () {
			const currentTheme = document.body.className;
			if (currentTheme !== 'light') {
				document.body.className = 'light';
			} else {
				document.body.className = 'dark';
			}
			let request = new XMLHttpRequest();
			request.open('GET', "http://localhost:8080/04-Quitz/inc/cookie.php?t=" + document.body.className, true);
			request.send();
		});
	</script>

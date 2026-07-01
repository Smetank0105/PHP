<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Forms</title>
	<link href="style.php" rel="stylesheet" />
</head>
<body>
	<h1>Forms</h1>
	<form action="form.php" method="GET">
		<input type="text" name="last_name" placeholder="Имя" />
		<input type="text" name="first_name" placeholder="Фамилия"/>
		<input type="email" name="email" placeholder="E-mail"/>
		<input type="submit" value="Отправить" />
	</form>
</body>
</html>
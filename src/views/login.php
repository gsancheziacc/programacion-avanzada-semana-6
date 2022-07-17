<?php
?>

<html lang="ES">
<head>
    <title>Autenticación</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<section style="display: flex; flex-direction: column; align-items: center">
		<h1>Autenticación</h1>
		<form action="../actions/auth/initialize.php" method="post" style="display: flex; flex-direction: column; max-width: 80vw; justify-content: center; align-items: center">
			<input type="text" name="email" placeholder="Email" style="min-width: 300px">
			<input type="password" name="password" placeholder="Password" style="min-width: 300px">
			<input type="submit" value="Login" style="max-width: 250px">
		</form>
	</section>
</body>
</html>

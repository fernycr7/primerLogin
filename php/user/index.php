<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>usuario</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<body>
	<header class="card-header text-center">
		<h1><strong>Bienvenido</strong></h1>
		<h5><?php echo $_SESSION['usuario'] ?> <small><a href="../logout/logout.php">Salir</a></small></h5>	 	
	</header>
</body>
</html>
<?php session_start(); ?>
<html>
<head>
	<title>**Agricultura Transparente: Plataforma de Gestión y Trazabilidad para la Sostenibilidad Agrícola**</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		BIENVENIDO Plataforma de Gestión y Trazabilidad para la Sostenibilidad Agrícola<br>
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>cerrar sesion</a><br/>
		<br/>
		<a href='view.php'>Ver y editar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar dado de alta para acceder a la pagina.<br/><br/>";
		echo "<a href='login.php'>Iniciar secion</a> | <a href='register.php'>Registrar</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://hectorrezaramirez18.github.io/Pizzeria_Reza/webmaster.html" title="Mukesh Chapagain">Hector E. Reza Ramirez</a>
	</div>
</body>
</html>

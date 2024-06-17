<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$provedor = $_POST['provedor'];
	$tipo = $_POST['tipo'];
	$cantidad = $_POST['cantidad'];
	$fecha = $_POST['fecha'];
	$forma = $_POST['forma'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($nombre) || empty($precio) || empty($provedor) || empty($tipo) || empty($cantidad) || empty($fecha) || empty($forma)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>completa el campo nombre.</font><br/>";
		}
		
		if(empty($precio)) {
			echo "<font color='red'>completa el campo Precio.</font><br/>";
		}
		
		if(empty($provedor)) {
			echo "<font color='red'>completa el campo Provedor.</font><br/>";
		}

		if(empty($tipo)) {
			echo "<font color='red'>completa el campo Tipo.</font><br/>";
		}
		if(empty($cantidad)) {
			echo "<font color='red'>completa el campo Cantidad.</font><br/>";
		}
		if(empty($fecha)) {
			echo "<font color='red'>completa el campo Fecha.</font><br/>";
		}
		if(empty($forma)) {
			echo "<font color='red'>completa el campo Forma.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO tinventario(nombre, precioi, provedor, tipop, cantidad, fechae, formap, login_id) VALUES('$nombre','$precio','$provedor','$tipo','$cantidad','$fecha','$forma','$loginId')");
		
		//display success message
		echo "<font color='green'>Datos agregados correctamente.";
		echo "<br/><a href='view.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>

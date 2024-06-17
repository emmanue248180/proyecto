<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$provedor = $_POST['provedor'];	
	$tipo = $_POST['tipo'];
	$cantidad = $_POST['cantidad'];
	$fecha = $_POST['fecha'];
	$forma = $_POST['forma'];
	
	// checking empty fields
	if(empty($nombre) || empty($precio) || empty($provedor) || empty($tipo) || empty($cantidad) || empty($fecha) || empty($forma)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>llena el campo nombre.</font><br/>";
		}
		
		if(empty($precio)) {
			echo "<font color='red'>llena el campo precio.</font><br/>";
		}
		
		if(empty($provedor)) {
			echo "<font color='red'>llena el campo provedor.</font><br/>";
		}	

		if(empty($tipo)) {
			echo "<font color='red'>llena el campo tipo.</font><br/>";
		}	

		if(empty($cantidad)) {
			echo "<font color='red'>llena el campo cantidad.</font><br/>";
		}	

		if(empty($fecha)) {
			echo "<font color='red'>llena el campo fecha.</font><br/>";
		}	

		if(empty($forma)) {
			echo "<font color='red'>llena el campo forma.</font><br/>";
		}	
	} else {	
		//updating the table
	    $result = mysqli_query($mysqli, "UPDATE tinventario SET nombre='$nombre', precioi='$precio', provedor='$provedor', tipop='$tipo', cantidad='$cantidad', fechae='$fecha', formap='$forma' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tinventario WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$nombre = $res['nombre'];
	$tipo = $res['precioi'];
	$acabado = $res['provedor'];
	$distribuidor = $res['tipop'];
	$precio = $res['cantidad'];
	$medidas = $res['fechae'];
	$ancho = $res['formap'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="view.php">Ver productos</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre Trabajador</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>
			<tr> 
				<td>Precio Ingredientes</td>
				<td><input type="text" name="precio" value="<?php echo $tipo;?>"></td>
			</tr>
			<tr> 
				<td>Provedor</td>
				<td><input type="text" name="provedor" value="<?php echo $acabado;?>"></td>
			</tr>
			<tr> 
				<td>Tipo Productos</td>
				<td><input type="text" name="tipo" value="<?php echo $distribuidor;?>"></td>
			</tr>
			<tr> 
				<td>Cantidad</td>
				<td><input type="text" name="cantidad" value="<?php echo $precio;?>"></td>
			</tr>
			<tr> 
				<td>Fecha Entrega</td>
				<td><input type="text" name="fecha" value="<?php echo $medidas;?>"></td>
			</tr>
			<tr> 
				<td>Forma Pago</td>
				<td><input type="text" name="forma" value="<?php echo $ancho;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Enviar"></td>
			</tr>
		</table>
	</form>
</body>
</html>

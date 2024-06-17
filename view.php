<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM tinventario WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">Agregar nuevo dato</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	<h1>Tabla Inventario</h1>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>NombreTrabajador</td>
			<td>PrecioIngredientes</td>
			<td>Provedor</td>
			<td>TipoProductos</td>
			<td>cantidad</td>
			<td>FechaEntrega</td>
			<td>FormaPago</td>
			<td>Actualizar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nombre']."</td>";
			echo "<td>".$res['precioi']."</td>";
			echo "<td>".$res['provedor']."</td>";	
			echo "<td>".$res['tipop']."</td>";
			echo "<td>".$res['cantidad']."</td>";
			echo "<td>".$res['fechae']."</td>";
			echo "<td>".$res['formap']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Seguro que quiere borrar el registro?')\">Borrar</a></td>";		
		}
		?>
	</table>	
</body>
</html>

<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM producto;");
		$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($productos);
	}else{
		echo "Error en el sistema";
	}


	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de productos</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
		<a href="cerrar.php">Cerrar Sesión</a>
		<h3>Lista de Productos</h3>
		<table>
			<tr>
                                <td>Codigo</td>
                                <td>Modelo</td>
				<td>Tipo</td>
				<td>Marca</td>
				<td>Color</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>

			<?php 
				foreach ($productos as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_producto; ?></td>
						<td><?php echo $dato->modelo; ?></td>
                                                <td><?php echo $dato->tipo; ?></td>
						<td><?php echo $dato->marca; ?></td>
						<td><?php echo $dato->color; ?></td>
						<td><a href="editar.php?id=<?php echo $dato->id_producto; ?>">Editar</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->id_producto; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

		<!-- inicio insert -->
		<hr>
		<h3>Ingresar productos:</h3>
		<form method="POST" action="insertar.php">
			<table>
				<tr>
					<td>Modelo: </td>
					<td><input type="text" name="txtModelo"></td>
				</tr>
                                <tr>
					<td>Tipo: </td>
					<td><input type="text" name="txtTipo"></td>
				</tr>
				<tr>
					<td>Marca: </td>
					<td><input type="text" name="txtMarca"></td>
				</tr>
				<tr>
					<td>Color: </td>
					<td><input type="text" name="txtColor"></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="INGRESAR PRODUCTO"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->

	</center>
</body>
</html>
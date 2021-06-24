<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: index.php');
	}

	


	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM producto WHERE id_producto = ?;");
		$sentencia->execute([$id]);
		$objeto = $sentencia->fetch(PDO::FETCH_OBJ);
		//print_r($objeto);
	}else{
		echo "Error en el sistema";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Producto</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h3>Editar Producto:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
				
				<tr>
					<td>Modelo: </td>
					<td><input type="text" name="txt2Modelo" value="<?php echo $objeto->modelo; ?>"></td>
				</tr>
                                <tr>
					<td>Tipo: </td>
					<td><input type="text" name="txt2Tipo" value="<?php echo $objeto->tipo; ?>"></td>
				</tr>
				<tr>
					<td>Marca: </td>
					<td><input type="text" name="txt2Marca" value="<?php echo $objeto->marca; ?>"></td>
				</tr>
				<tr>
					<td>Color: </td>
					<td><input type="text" name="txt2Color" value="<?php echo $objeto->color; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $objeto->id_producto; ?>">
					<td colspan="2"><input type="submit" value="EDITAR PRODUCTO"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>
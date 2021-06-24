<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: index.php');
	}

	include 'model/conexion.php';
	$id2 = $_POST['id2'];
	$modelo2 = $_POST['txt2Modelo'];
        $tipo2 = $_POST['txt2Tipo'];
	$marca2 = $_POST['txt2Marca'];
	$color2 = $_POST['txt2Color'];

	$sentencia = $bd->prepare("UPDATE producto SET modelo = ?, tipo = ?, marca = ?, 
										       color = ?, WHERE id_producto = ?;");
	$resultado = $sentencia->execute([$modelo2,$tipo2,$marca2,$color2, $id2]);

	if ($resultado === TRUE) {
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>
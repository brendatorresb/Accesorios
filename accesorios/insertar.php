<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'model/conexion.php';
	$modelo = $_POST['txtModelo'];
	$tipo = $_POST['txtTipo'];
	$marca = $_POST['txtMarca'];
	$color = $_POST['txtColor'];

	$sentencia = $bd->prepare("INSERT INTO producto(modelo,tipo,marca,color) VALUES (?,?,?,?);");
	$resultado = $sentencia->execute([$modelo,$tipo,$marca,$color]);

	if ($resultado === TRUE) {
		//echo "Insertado correctamente";
		header('Location: index.php');
	}else{
		echo "Error";
	}
?>
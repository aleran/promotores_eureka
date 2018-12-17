<?php
	include("../conexion/bdd.php");


	if (isset($_GET["rechazar"])) {
		
		$sql = "UPDATE pedidos SET estado='3' WHERE id='".$_GET["rechazar"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		echo "<script>alert('Pedido Rechazado');window.location='../lista_pedidos.php';</script>";
	}elseif (isset($_GET["aprobar"])) {

		$sql = "UPDATE pedidos SET estado='2' WHERE id='".$_GET["aprobar"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		echo "<script>alert('Pedido Aprobado');window.location='../lista_pedidos.php';</script>";

	}else{

		$sql = "UPDATE pedidos SET estado='4', factura='".$_GET["factura"]."' WHERE id='".$_GET["entregado"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		echo "<script>alert('Pedido Entregado');window.location='../pedidos_aprobados.php';</script>";
	}

	
?>

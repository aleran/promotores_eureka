<?php
	if (isset($_POST["periodo"])) {
	 	require_once("../php/aut.php");
		include("../conexion/bdd.php");

		
		$sql = "INSERT INTO periodos VALUES(null, '".$_POST["periodo"]."', '".$_POST["f_cierre"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}
?>
<script>alert('Datos actualizados correctamente');window.location="../ver_periodos.php";</script>;
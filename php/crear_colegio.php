<?php
	if (isset($_POST["colegio"])) {
	 
		include("../conexion/bdd.php");

		$sql = "INSERT INTO colegios(colegio,codigo,direccion,barrio,representante,telefono,web,cumpleaños) VALUES('".$_POST["colegio"]."', '".$_POST["codigo"]."', '".$_POST["direccion"]."', '".$_POST["barrio"]."', '".$_POST["representate"]."', '".$_POST["telefono"]."', '".$_POST["web"]."', '".$_POST["cumple_colegio"]."')";
		$req = $bdd->prepare($sql);
		$req->execute();
		
	}
?>
<script>alert('Colegio creado correctamente');window.location="../colegio.php?codigo=<?php echo $_POST["codigo"];?>";
</script>;
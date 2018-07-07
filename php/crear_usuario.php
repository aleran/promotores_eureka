<?php
	include("../conexion/bdd.php");
	if (isset($_POST["correo"])) {
		$sql = "SELECT correo FROM usuarios WHERE correo='".$_POST["correo"]."'";
		$req = $bdd->prepare($sql);
		$req->execute();
		$num_usr = $req->rowCount();

		if ($num_usr > 0) {
			echo "<script>alert('Correo Ya existe, intente con otro correo');window.location='../usuarios.php';</script>;";
		}
		else {

			$sql_z = "INSERT INTO usuarios (tipo,id_pais,nombres,apellidos,telefono,correo,clave) VALUES ('".$_POST["tipo"]."','".$_POST["pais"]."','".$_POST["nombres"]."','".$_POST["apellidos"]."', '".$_POST["telefono"]."','".$_POST["correo"]."','".md5($_POST["clave"])."')";
		
			//echo $sql_z;
			
			$query_z = $bdd->prepare( $sql_z );
			if ($query_z == false) {
			 print_r($bdd->errorInfo());
			 die ('Erreur prepare');
			}
			$sth_z = $query_z->execute();
			if ($sth_z == false) {
			 print_r($query_z->errorInfo());
			 die ('Erreur execute');
			}

		}
	}
	
?>
<script>alert('Usuario creado correctamente');window.location="../usuarios.php";</script>;
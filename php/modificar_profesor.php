<?php
	include("../conexion/bdd.php");


	$sql_p = "UPDATE trabajadores_colegios SET nombre='".$_POST["profesor"]."', telefono='".$_POST["telefono_p"]."', email='".$_POST["email_p"]."' WHERE codigo='".$_POST["cod_profesor"]."'";
				
				//echo $sql_z;
				
				$query_p = $bdd->prepare( $sql_p );
				if ($query_p == false) {
				 print_r($bdd->errorInfo());
				 die ('Erreur prepare');
				}
				$sth_p = $query_p->execute();
				if ($sth_p == false) {
				 print_r($query_p->errorInfo());
				 die ('Erreur execute');
				}

	

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'&periodo='.$_POST["periodo"].'')
?>
<!--<script>alert('Zona creada correctamente');window.location="../agregar_zonas.php";</script>;-->
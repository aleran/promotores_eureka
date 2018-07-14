<?php 
	require_once('../conexion/bdd.php');
	
		$sql_periodo="SELECT id FROM periodos WHERE id='".$_POST["periodo"]."'";


		$req_periodo = $bdd->prepare($sql_periodo);
		$req_periodo->execute();
		$gp_periodo = $req_periodo->fetch();

		$sql_p="INSERT INTO areas_objetivas(id_periodo,id_colegio,id_materia,id_grado,id_libro_eureka) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."', '".$_POST["materia1"]."', '".$_POST["grado1"]."', '".$_POST["libro_e1"]."')";

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

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'&periodo='.$_POST["periodo"].'');
	
?>
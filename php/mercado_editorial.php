<?php 
	require_once('../conexion/bdd.php');
	
	$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();

	if ($_POST["tipo_editorial"] == 1) {
		$sql_p="INSERT INTO mercado_editorial(id_periodo,id_colegio,id_materia,id_grado,id_tipo_libro,editorial,id_libro_eureka,vigencia) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','".$_POST["materia"]."','".$_POST["grado"]."', '".$_POST["tipo_libro"]."', 'Eureka', '".$_POST["libro_e"]."','".$_POST["vigencia"]."')";
	}

	else {
		$sql_p="INSERT INTO mercado_editorial(id_periodo,id_colegio,id_materia,id_grado,id_tipo_libro,editorial,libro,vigencia) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."', '".$_POST["materia"]."', '".$_POST["grado"]."', '".$_POST["tipo_libro"]."', '".$_POST["editorial"]."','".$_POST["libro"]."','".$_POST["vigencia"]."')";

	}

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
	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'');
	
?>
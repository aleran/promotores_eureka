<?php 
	require_once('../conexion/bdd.php');

	$sql_periodo="SELECT id FROM periodos WHERE id='".$_POST["periodo"]."'";


	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();

	if (isset($_POST["p_pre"]) && isset($_POST["a_pre"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','1','".$_POST["p_pre"]."','".$_POST["a_pre"]."')";

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


	}

	if (isset($_POST["p_jar"]) && isset($_POST["a_jar"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','2','".$_POST["p_jar"]."','".$_POST["a_jar"]."')";

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


	}

	if (isset($_POST["p_tra"]) && isset($_POST["a_tra"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','3','".$_POST["p_tra"]."','".$_POST["a_tra"]."')";

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


	}

	if (isset($_POST["p_1"]) && isset($_POST["a_1"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','4','".$_POST["p_1"]."','".$_POST["a_1"]."')";

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


	}

	if (isset($_POST["p_2"]) && isset($_POST["a_2"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','5','".$_POST["p_2"]."','".$_POST["a_2"]."')";

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


	}

	if (isset($_POST["p_3"]) && isset($_POST["a_3"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','6','".$_POST["p_3"]."','".$_POST["a_3"]."')";

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


	}

	if (isset($_POST["p_4"]) && isset($_POST["a_4"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','7','".$_POST["p_4"]."','".$_POST["a_4"]."')";

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


	}

	if (isset($_POST["p_5"]) && isset($_POST["a_5"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','8','".$_POST["p_5"]."','".$_POST["a_5"]."')";

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


	}

	if (isset($_POST["p_6"]) && isset($_POST["a_6"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','9','".$_POST["p_6"]."','".$_POST["a_6"]."')";

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


	}

	if (isset($_POST["p_7"]) && isset($_POST["a_7"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','10','".$_POST["p_7"]."','".$_POST["a_7"]."')";

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


	}

	if (isset($_POST["p_8"]) && isset($_POST["a_8"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','11','".$_POST["p_8"]."','".$_POST["a_8"]."')";

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


	}

	if (isset($_POST["p_9"]) && isset($_POST["a_9"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','12','".$_POST["p_9"]."','".$_POST["a_9"]."')";

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


	}

	if (isset($_POST["p_10"]) && isset($_POST["a_10"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','13','".$_POST["p_10"]."','".$_POST["a_10"]."')";

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


	}

	if (isset($_POST["p_11"]) && isset($_POST["a_11"])) {
		
		$sql_p="INSERT INTO grados_paralelos(id_periodo,id_colegio,id_grado,paralelos,alumnos) VALUES('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','14','".$_POST["p_11"]."','".$_POST["a_11"]."')";

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


	}

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'&periodo='.$_POST["periodo"].'');
	
?>
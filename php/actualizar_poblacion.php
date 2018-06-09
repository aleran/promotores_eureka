<?php 
	require_once('../conexion/bdd.php');

	$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();

	if (isset($_POST["p_pre"]) || isset($_POST["a_pre"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_pre"]."', alumnos='".$_POST["a_pre"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='1'";

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

	if (isset($_POST["p_jar"]) || isset($_POST["a_jar"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_jar"]."', alumnos='".$_POST["a_jar"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='2'";

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

	if (isset($_POST["p_tra"]) || isset($_POST["a_tra"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_tra"]."', alumnos='".$_POST["a_tra"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='3'";

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

	if (isset($_POST["p_1"]) || isset($_POST["a_1"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_1"]."', alumnos='".$_POST["a_1"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='4'";

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

	if (isset($_POST["p_2"]) || isset($_POST["a_2"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_2"]."', alumnos='".$_POST["a_2"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='5'";

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

	if (isset($_POST["p_3"]) || isset($_POST["a_3"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_3"]."', alumnos='".$_POST["a_3"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='6'";

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

	if (isset($_POST["p_4"]) | isset($_POST["a_4"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_4"]."', alumnos='".$_POST["a_4"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='7'";

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

	if (isset($_POST["p_5"]) || isset($_POST["a_5"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_5"]."', alumnos='".$_POST["a_5"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='8'";

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

	if (isset($_POST["p_6"]) || isset($_POST["a_6"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_6"]."', alumnos='".$_POST["a_6"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='9'";

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

	if (isset($_POST["p_7"]) || isset($_POST["a_7"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_7"]."', alumnos='".$_POST["a_7"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='10'";

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

	if (isset($_POST["p_8"]) || isset($_POST["a_8"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_8"]."', alumnos='".$_POST["a_8"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='11'";

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

	if (isset($_POST["p_9"]) || isset($_POST["a_9"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_9"]."', alumnos='".$_POST["a_9"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='12'";

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

	if (isset($_POST["p_10"]) || isset($_POST["a_10"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_10"]."', alumnos='".$_POST["a_10"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='13'";

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

	if (isset($_POST["p_11"]) || isset($_POST["a_11"])) {
		
		$sql_p="UPDATE grados_paralelos SET paralelos='".$_POST["p_11"]."', alumnos='".$_POST["a_11"]."' WHERE id_colegio='".$_POST["id_colegio"]."' AND id_periodo='".$gp_periodo["id"]."' AND id_grado='14'";

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

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'');
	
?>
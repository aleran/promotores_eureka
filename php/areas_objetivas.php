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


		if ($_POST["grado1"] > 14 ) {
			echo "entro";
			$sq_l2 = "SELECT id FROM libros WHERE pri_sec='".$_POST["libro_e1"]."'";
														
			$req_l2 = $bdd->prepare($sq_l2);
			$req_l2->execute();
			$libros2 = $req_l2->fetchAll();

			foreach ($libros2 as $libro2) {
				echo $libro2["id"];
				$sql_e = "INSERT INTO presupuestos(id_periodo,id_colegio, id_libro, precio, tasa_compra,descuento) values ('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','".$libro2["id"]."','0', '0', '0.20')";

				$query_e = $bdd->prepare( $sql_e );
				if ($query_e == false) {
					print_r($bdd->errorInfo());
						die ('Erreur prepare');
				}
				$sth_e = $query_e->execute();
				if ($sth_e == false) {
					print_r($query_e->errorInfo());
					die ('Erreur execute');
				}

			}

		}else {

			$sql_e = "INSERT INTO presupuestos(id_periodo,id_colegio, id_libro, precio, tasa_compra,descuento) values ('".$gp_periodo["id"]."','".$_POST["id_colegio"]."','".$_POST["libro_e1"]."','0', '0', '0.20')";

			$query_e = $bdd->prepare( $sql_e );
			if ($query_e == false) {
				print_r($bdd->errorInfo());
					die ('Erreur prepare');
			}
			$sth_e = $query_e->execute();
			if ($sth_e == false) {
				print_r($query_e->errorInfo());
				die ('Erreur execute');
			}
		}


		

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'&periodo='.$_POST["periodo"].'');
	
?>
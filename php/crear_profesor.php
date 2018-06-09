<?php
	include("../conexion/bdd.php");

	do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=8; //numero de letras para generar el texto
	         $cod_profesor =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_profesor .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM trabajadores_colegios";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_profesor !="") {
					if (($codigo["codigo"]==$cod_profesor)) $cod_profesor="";
				}
			}
	   
	      } while ($cod_profesor=="");

	$sql_p = "INSERT INTO trabajadores_colegios(codigo,id_colegio, cargo, nombre, telefono, email) values ('".$cod_profesor."','".$_POST["id_colegio"]."','6', '".$_POST["profesor"]."' ,'".$_POST["telefono_p"]."','".$_POST["email_p"]."')";
				
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

	$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();

	foreach ($_POST["materia"] as $materias => $materia) {

		foreach ($_POST["grado"] as $grados => $grado) {
			$sql_z = "INSERT INTO grados_materias(id_periodo,cod_profesor, id_grado, id_materia) values ('".$gp_periodo["id"]."','".$cod_profesor."','".$grado."', '".$materia."')";
				
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

	header('Location: ../colegio.php?codigo='.$_POST["cod_colegio"].'')
?>
<!--<script>alert('Zona creada correctamente');window.location="../agregar_zonas.php";</script>;-->
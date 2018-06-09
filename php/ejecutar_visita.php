<?php
require_once("aut.php");
// Conexion a la base de datos
require_once('../conexion/bdd.php');

	$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();

	//$color = $_POST['color'];

	if (isset($_POST["materia"])) {

		if ($_POST["libro2"]=="no") {
			do {
		    $caracteres = "1234567890"; //posibles caracteres a usar
		    $numerodeletras=8; //numero de letras para generar el texto
		    $cod_libro =""; //variable para almacenar la cadena generada
		    for($i=0;$i<$numerodeletras;$i++)
		    {
		       $cod_libro .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
		            entre el rango 0 a Numero de letras que tiene la cadena */
		    }
		    $sql = "SELECT codigo FROM libros";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

		    foreach($codigos as $codigo) {
				if ($cod_libro !="") {
					if (($codigo["codigo"]==$cod_libro)) $cod_libro="";
				}
			}
	   
			} while ($cod_libro=="");

			$sql_l = "INSERT INTO libros(codigo,id_materia,id_grado,libro) values ('".$cod_libro."','".$_POST["materia"]."', '".$_POST["grado"]."','".$_POST["libro"]."')";
		
			
			$query_l = $bdd->prepare( $sql_l );
			if ($query_l == false) {
			 print_r($bdd->errorInfo());
			 die ('Erreur prepare');
			}
			$sth_l = $query_l->execute();
			if ($sth_l == false) {
			 print_r($query_l->errorInfo());
			 die ('Erreur execute');
			}
		}

		
		else{

			$sql = "SELECT codigo FROM libros WHERE id='".$_POST["libro2"]."'";
			$req = $bdd->prepare($sql);
			$req->execute();
			$codigo = $req->fetch();
			$cod_libro =$codigo["codigo"];

			

		}

		$sql_v = "INSERT INTO visitas(id_periodo,id_plan_trabajo,observaciones,cod_libro,latitud,longitud) values ('".$gp_periodo["id"]."','".$_POST["id_visita"]."', '".$_POST["comentarios"]."','".$cod_libro."','".$_POST["latitud"]."', '".$_POST["longitud"]."')";
		
			
			$query_v = $bdd->prepare( $sql_v );
			if ($query_v == false) {
			 print_r($bdd->errorInfo());
			 die ('Erreur prepare');
			}
			$sth_v = $query_v->execute();
			if ($sth_v == false) {
			 print_r($query_v->errorInfo());
			 die ('Erreur execute');
			}

			$sth_p = "UPDATE plan_trabajo SET resultado='1', color='#008000' WHERE id='".$_POST["id_visita"]."'";
			
			
			$query_p = $bdd->prepare( $sth_p );
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
	else{
		$sql_v = "INSERT INTO visitas(id_periodo,id_plan_trabajo,observaciones,latitud,longitud) values ('".$gp_periodo["id"]."','".$_POST["id_visita"]."', '".$_POST["comentarios"]."','".$_POST["latitud"]."', '".$_POST["longitud"]."')";
		
		
		$query_v = $bdd->prepare( $sql_v );
		if ($query_v == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth_v = $query_v->execute();
		if ($sth_v == false) {
		 print_r($query_v->errorInfo());
		 die ('Erreur execute');
		}

		$sth_p = "UPDATE plan_trabajo SET resultado='1', color='#008000' WHERE id='".$_POST["id_visita"]."'";
		
		
		$query_p = $bdd->prepare( $sth_p );
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


header('Location: ../calendar.php');

	
?>

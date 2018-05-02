<?php

// Conexion a la base de datos
require_once('../conexion/bdd.php');

if (isset($_POST['colegio']) &&  isset($_POST['profesor']) && isset($_POST['objetivo']) && isset($_POST['start']) && isset($_POST['end'])){
	
	$colegio = $_POST['colegio'];
	$profesor = $_POST['profesor'];
	$objetivo = $_POST['objetivo'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$materia = $_POST['materia'];
	$grado = $_POST['grado'];
	//$color = $_POST['color'];

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

	$sql_p = "INSERT INTO trabajadores_colegios(codigo,id_colegio,cargo,nombre) values ('$cod_profesor','$colegio', '6', '$profesor')";
	
	echo $sql_p;
	
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

	$sql_gm = "INSERT INTO grados_materias(id_grado,id_materia,cod_profesor) values ('$grado','$materia', '$cod_profesor')";
	
	echo $sql_gm;
	
	$query_gm = $bdd->prepare( $sql_gm );
	if ($query_gm == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth_gm = $query_gm->execute();
	if ($sth_gm == false) {
	 print_r($query_gm->errorInfo());
	 die ('Erreur execute');
	}

	$sql = "INSERT INTO plan_trabajo(id_periodo,id_promotor,id_colegio,cod_profesor,id_objetivo,resultado,color,start,end) values ('1', '1', '$colegio', '$cod_profesor', '$objetivo','0','#0071c5', '$start', '$end')";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

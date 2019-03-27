<?php
require_once("../php/aut.php");
// Conexion a la base de datos
require_once('../conexion/bdd.php');

$sql_periodo="SELECT id FROM periodos ORDER BY id DESC";

	$req_periodo = $bdd->prepare($sql_periodo);
	$req_periodo->execute();
	$gp_periodo = $req_periodo->fetch();
	
	$colegio = $_POST['cole'];
	$profesor = $_POST['profesor'];
	$objetivo = $_POST['objetivo'];
	$start = $_POST['start'];
	$end = $_POST['end'];

if(isset($_POST["oficina"])) {
	
	$sql = "INSERT INTO plan_trabajo(id_periodo,id_promotor,id_colegio,resultado,color,start,end) values ('".$gp_periodo["id"]."', '".$_SESSION['id']."','1','0','#0071c5', '$start', '$end')";
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
else {



	
	//$color = $_POST['color'];


    $sql = "SELECT codigo FROM trabajadores_colegios WHERE id='".$_POST["profe"]."'";
	$req = $bdd->prepare($sql);
	$req->execute();
	$codigo = $req->fetch();
	$cod_profesor =$codigo["codigo"];
	

	
	

	if ($objetivo==2) {

		do {
	        $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=10; //numero de letras para generar el texto
	         $cod_pedido =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_pedido .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM muestreos";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_pedido !="") {
					if (($codigo["codigo"]==$cod_pedido)) $cod_pedido="";
				}
			}
	   
	 	} while ($cod_pedido=="");

	 	$sql = "INSERT INTO plan_trabajo(id_periodo,id_promotor,id_colegio,cod_profesor,id_objetivo,cod_muestreo,resultado,color,start,end) values ('".$gp_periodo["id"]."', '".$_SESSION['id']."', '$colegio', '$cod_profesor', '$objetivo','$cod_pedido','0','#0071c5', '$start', '$end')";
	
	
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


		foreach ($_POST["libro_e"] as $libros => $libro) {

			list($id_libro,$cantidad,$grado_otro) = explode("/", $libro);
				
			if ($libro !=0) {
				
				$sql_p = "INSERT INTO libros_muestreos(cod_muestreo,id_libro,cantidad,id_grado_otro) VALUES('".$cod_pedido."','".$id_libro."','".$cantidad."','".$grado_otro."')";
					
					
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
			

		}

		$sql_p2 = "INSERT INTO muestreos(codigo,id_periodo,id_colegio,id_usuario,observaciones,estado) VALUES('".$cod_pedido."','".$gp_periodo["id"]."','".$colegio."','".$_SESSION["id"]."','".$_POST["observaciones"]."','1')";
				
				
		$query_p2 = $bdd->prepare( $sql_p2 );
		if ($query_p2 == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
		}
		$sth_p2 = $query_p2->execute();
		if ($sth_p2 == false) {
			print_r($query_p2->errorInfo());
			die ('Erreur execute');
		}
	}else{

		$sql = "INSERT INTO plan_trabajo(id_periodo,id_promotor,id_colegio,cod_profesor,id_objetivo,resultado,color,start,end) values ('".$gp_periodo["id"]."', '".$_SESSION['id']."', '$colegio', '$cod_profesor', '$objetivo','0','#0071c5', '$start', '$end')";
	
	
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
	
}


header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

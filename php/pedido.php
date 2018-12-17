<?php 
	require_once("../php/aut.php");
	require_once('../conexion/bdd.php');
	
	
	do {
	         $caracteres = "1234567890"; //posibles caracteres a usar
	         $numerodeletras=10; //numero de letras para generar el texto
	         $cod_pedido =""; //variable para almacenar la cadena generada
	         for($i=0;$i<$numerodeletras;$i++)
	         {
	            $cod_pedido .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
	            entre el rango 0 a Numero de letras que tiene la cadena */
	         }
	        $sql = "SELECT codigo FROM pedidos";

			$req = $bdd->prepare($sql);
			$req->execute();
			$codigos = $req->fetchAll();

	         foreach($codigos as $codigo) {
				if ($cod_pedido !="") {
					if (($codigo["codigo"]==$cod_pedido)) $cod_pedido="";
				}
			}
	   
	 } while ($cod_pedido=="");


	foreach ($_POST["libro"] as $libros => $libro) {

		list($id_libro,$cantidad) = explode("/", $libro);
			
		$sql_p = "INSERT INTO libros_pedidos(cod_pedido,id_libro,cantidad) VALUES('".$cod_pedido."','".$id_libro."','".$cantidad."')";
				
				
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

	$sql_p2 = "INSERT INTO pedidos(codigo,id_periodo,id_colegio,id_usuario,observaciones,estado) VALUES('".$cod_pedido."','".$_POST["periodo"]."','".$_POST["id_colegio"]."','".$_SESSION["id"]."','".$_POST["observaciones"]."','1')";
				
				
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

		
		
	echo "<script>alert('Pedido Solicitado');window.location='../colegios_pedidos.php';</script>";
	
?>
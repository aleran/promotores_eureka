<?php 

require_once("php/aut.php");
include("conexion/bdd.php");
include("lib/PHPExcel.php");
$sql_l = "SELECT l.libro FROM presupuestos p JOIN libros l ON p.id_libro=l.id WHERE p.id_periodo='2' AND p.precio !=0";
		$req_l = $bdd->prepare($sql_l);
		$req_l->execute();
		$libros = $req_l->fetchAll();
		$libros = array_map("unserialize", array_unique(array_map("serialize", $libros)));





		foreach ($libros as $libro) {

			echo $libro["libro"]."<br>";
		}
 ?>
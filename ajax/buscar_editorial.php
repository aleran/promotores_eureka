<?php
	require_once('../conexion/bdd.php');  
	$editorial=$_POST["editorial"];
	$sql = "SELECT editorial FROM mercado_editorial WHERE editorial like'%".$editorial."%' group by editorial";
	$req = $bdd->prepare($sql);
	$req->execute();
	$editoriales = $req->fetchAll();

	foreach($editoriales as $edit) {
		$editorial1=$edit["editorial"];
		echo "<div class='suggest-element'><a data-editorial='".$editorial1."'>$editorial1</a></div>";
	}
?>
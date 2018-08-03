<?php 

	function saber_dia($nombredia) {

	$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');

	$fecha = $dias[date('N', strtotime($nombredia))];

	echo $fecha;

	}

	// ejecutamos la función pasándole la fecha que queremos

	saber_dia('2018-08-02');

?>
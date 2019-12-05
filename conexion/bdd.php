<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
 
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bd_promotores;charset=utf8', 'promotores', 'promoE123$#');
	date_default_timezone_set('America/Bogota');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
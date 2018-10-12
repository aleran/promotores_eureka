<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bd_promotores;charset=utf8', 'promotores', 'promotores123#eureka');
	date_default_timezone_set('America/Bogota');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
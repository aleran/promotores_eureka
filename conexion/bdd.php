<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bd_promotores;charset=utf8', 'root', '102236');
	date_default_timezone_set('America/Bogota');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
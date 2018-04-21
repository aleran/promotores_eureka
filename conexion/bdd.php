<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bd_promotores;charset=utf8', 'root', '102236');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
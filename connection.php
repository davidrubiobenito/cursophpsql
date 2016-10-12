<?php

$dsn = 'mysql:dbname=php_sql_course;host=192.168.1.25';
$user = 'root';
$password = '1234';

try
{
	$pdo = new PDO(	$dsn,
					$user,
					$password
					);
}
catch( PDOException $e )
{
	echo 'Error al conectarnos: ' . $e->getMessage();
}

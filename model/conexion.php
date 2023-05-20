<?php
include('datos.php');
class Conexion
{
	public static function Conexion()
	{
		try {
			$conexion = new PDO('mysql:host=' . SERVER . ';dbname=' . DBNAME, USER, PASSWORD);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET UTF8");
		} catch (PDOException $ex) {
			die("Error de Conexión" . $ex->getMessage());
		}
		return $conexion;
	}
}

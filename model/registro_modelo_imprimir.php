<?php

class Registro_Modelo
{
    private $db;
    private $registro;

    public function __construct()
    {
        require_once('conexion.php');
        $this->db = Conexion::Conexion();
        $this->registro = array();
    }

    public function get_registros_imprimir()
    {
        $consulta = $this->db->query('SELECT * FROM registros;');
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->registro[] = $filas;
        }
        return $this->registro;
    }

    public function get_registros_imprimir_buscar($buscar)
    {
        try {
            $consulta = $this->db->query('SELECT * FROM registros WHERE Apellido LIKE \'%'.$buscar.'%\';');
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->registro[] = $filas;
        }
        return $this->registro;
        } catch (PDOException $e) {
            $e->getMessage();
        }
        
    }
}

?>
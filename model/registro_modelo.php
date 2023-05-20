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

    public function get_registros()
    {
        $consulta = $this->db->query('SELECT * FROM Registros');
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->registro[] = $filas;
        }
        return $this->registro;
    }
}

class Registro_Borrar
{
    private $db;

    public function __construct()
    {
        require_once('conexion.php');
        $this->db = Conexion::Conexion();
        $this->registro = array();
    }

    public function borrar($id)
    {
        $consulta = $this->db->query('DELETE FROM Registros WHERE id = ' . $id . ';');
    }
}

class Registro_MostrarId
{
    private $db;
    private $registro;

    public function __construct()
    {
        require_once('conexion.php');
        $this->db = Conexion::Conexion();
        $this->registro = array();
    }

    public function verId($id)
    {
        $consulta = $this->db->query('SELECT * FROM Registros WHERE id = ' . $id . ' LIMIT 1;');
        return $this->registro = $consulta->fetch(PDO::FETCH_ASSOC);
    }
}

class Registro_AgregarID
{
    private $db;
    private $registro;

    public function __construct()
    {
        require_once('conexion.php');
        $this->db = Conexion::Conexion();
        $this->registro = array();
    }

    public function agregar($nombre, $apellido, $ciudad, $fecha, $email)
    {
        try {
            //$this->db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            $sql = "INSERT INTO registros (id, Nombre, Apellido, Ciudad, FechaInscripcion, Email)
            VALUES (DEFAULT, '$nombre', '$apellido', '$ciudad', '$fecha', '$email')";
            $this->db->exec($sql);
        } catch (PDOException $e) {
            echo  'Nombre: ' . $nombre, ' Apellido: ' . $apellido, ' Ciudad: ' . $ciudad, ' Fecha: ' . $fecha, ' Email: ' . $email . "<br>" . $e->getMessage();
            die();
        }
    }
}

class Registro_ModificarID
{
    private $db;
    private $registro;

    public function __construct()
    {
        require_once('conexion.php');
        $this->db = Conexion::Conexion();
        $this->registro = array();
    }

    public function modificar($nombre, $apellido, $ciudad, $fecha, $email, $id)
    {
        try {
            $sql = "UPDATE Registros 
            SET 
                Nombre = '$nombre',
                Apellido = '$apellido',
                Ciudad = '$ciudad',
                FechaInscripcion = '$fecha',
                Email = '$email'
            WHERE
                id = $id;";
            $this->db->exec($sql);
        } catch (PDOException $e) {
            echo  'Nombre: ' . $nombre, ' Apellido: ' . $apellido, ' Ciudad: ' . $ciudad, ' Fecha: ' . $fecha, ' Email: ' . $email . "<br>" . $e->getMessage();;
            die();
        }
    }
}

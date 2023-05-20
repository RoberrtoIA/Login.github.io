<?php

    require_once('../model/registro_modelo.php');

    $registro = new Registro_Modelo();
    $matrizRegistro = $registro->get_registros();

    require_once('../view/registro_vista.php');

?>
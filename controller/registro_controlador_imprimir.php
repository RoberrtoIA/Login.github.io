<?php

    require_once('../model/registro_modelo_imprimir.php');

    $registro = new Registro_Modelo();
    $matrizRegistro = $registro->get_registros_imprimir();

    require_once('../view/registro_vista_imprimir.php');

?>
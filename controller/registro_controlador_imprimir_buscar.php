<?php

    require_once('../model/registro_modelo_imprimir.php');

    $registro2 = new Registro_Modelo();
    $matrizRegistro = $registro2->get_registros_imprimir_buscar($_GET["buscar"]);
            
    require_once('../view/registro_vista_imprimir.php');

?>

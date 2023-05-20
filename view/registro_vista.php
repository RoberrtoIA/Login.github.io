<?php
    $contador = 0;
        foreach($matrizRegistro as $registro)
        {
            $contador++;
            echo '<tr>';
            echo '<th scope="row">'.$contador.'</th>';
            echo '<td style="width: 18%; text-align: center;">'.$registro["Nombre"].'</td>';
            echo '<td style="width: 18%; text-align: center;">'.$registro["Apellido"].'</td>';
            echo '<td style="width: 14%; text-align: center;">'.$registro["Ciudad"].'</td>';
            echo '<td style="width: 30%; text-align: center;">'.$registro["FechaInscripcion"].'</td>';
            echo '<td style="width: 30%; text-align: center;">'.$registro["Email"].'</td>';
            echo '<td>'.'<a href="crud.php?action=Modificar&&id='.$registro["id"].'""><img src="../assets/editar.png" width="25vh" alt="Editar"></a>'.'</td>';
            echo '<td>'.'<a href="crud.php?action=Eliminar&&id='.$registro["id"].'"><img src="../assets/delete.png" width="25vh" alt="Borrar"></a>'.'</td>';
            echo '</tr>';
        }
?>
<?php

        foreach($matrizRegistro as $registro)
        {
            $this->Cell(20, 10, $registro["id"], 1, 0, 'C');
            $this->Cell(40, 10, $registro["Nombre"], 1, 0, 'C');
            $this->Cell(40, 10, $registro["Apellido"], 1, 0, 'C');
            $this->Cell(40, 10, $registro["Ciudad"], 1, 0, 'C');
            $this->Cell(60, 10, $registro["FechaInscripcion"], 1, 0, 'C');
            $this->Cell(70, 10, $registro["Email"], 1, 0, 'C');
            $this->Ln();
        }

?>
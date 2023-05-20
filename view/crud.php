<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../index.php");
    die();
}

if (!isset($_GET["action"]) || $_GET["action"] != "Crear" && $_GET["action"] != "Modificar" && $_GET["action"] != "Eliminar") {
    header("Location: crud.php?action=Crear");
    die();
}

if (isset($_GET["action"])) {
    require_once('../model/registro_modelo.php');
    switch ($_GET["action"]) {
        case "Crear":
            //echo "Crear";
            if (isset($_GET["id"])) {
                $Crear = new Registro_AgregarID();
                $agregar = $Crear->agregar($_GET["nombre"], $_GET["apellido"], $_GET["ciudad"], $_GET["fecha"], $_GET["email"]);
                header("Location: crud.php?action=Crear&mensaje=1");
                die();
            }
            break;
        case "Modificar":
            $MostrarId = new Registro_MostrarId();
            $getId = $MostrarId->verId($_GET['id']);
            if (isset($_GET["id"]) && isset($_GET["nombre"]) && isset($_GET["apellido"]) && isset($_GET["ciudad"]) && isset($_GET["fecha"]) && isset($_GET["email"])) {
                $Modificar = new Registro_ModificarID();
                $update = $Modificar->modificar($_GET["nombre"], $_GET["apellido"], $_GET["ciudad"], $_GET["fecha"], $_GET["email"], $_GET["id"]);
                header("Location: crud.php?action=Crear&mensaje=2");
                die();
            }
            break;
        case "Eliminar":
            //require_once('model/registro_modelo.php');
            $ClaseBorrar = new Registro_Borrar();
            $borrar = $ClaseBorrar->borrar($_GET["id"]);
            header("Location: crud.php?action=Crear&mensaje=3");
            die();
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link href="../css/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <link href="../css/crud.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/elefantes.png">
    <title>Laboratorio 2</title>
</head>
<!-- background: URL('assets/img/fondo5.jpg'); background: linear-gradient(160deg, #eaeaea, #212737); -->

<body style="font-family: 'Times New Roman', Times, serif; background-color: #eaeaea; overflow-y: hidden; background: URL('assets/img/fondo5.jpg')">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="funciones.js"></script> -->
    <div class="container-fluid">
        <div class="row">
            <!-- background: linear-gradient(#000000, #ffffff); background-color: #212737; height: 100vh; -->
            <div class="col-1" style="background-color: #212737; height: 100vh;">
                <div style="text-align: center; padding-top: 12vh;">
                    <div class="row" style="height: 10vh;">
                        <a id="GFG" href="crud.php?action=Crear">
                            <div class="container">
                                <i class="fas fa-server fa-3x"></i> Registros
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <a id="GFG" href="reporte.php" target="_blank">
                            <div class="container">
                                <i class="fas fa-file-pdf fa-3x"></i> Imprimir
                            </div>
                        </a>
                    </div>
                    <div class="row" style="margin-top: 50vh;">
                        <a id="GFG" href="../view/logout.php">
                            <div class="container">
                                <i class="fas fa-sign-out-alt fa-3x"></i> <br> Salir
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-11">
                <div class="row" style="background: linear-gradient(to right, #212737, #eaeaea); padding: 1vh;">
                    <div style="padding-left: 90%;">
                        <div class="container">
                            <?php echo $_SESSION["admin"]; ?> <i class="fas fa-user-circle fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" style="margin-right: 5vh;">
                    <h1 style="margin: 5vh; margin-bottom: -2vh;">Registros</h1>
                    <div class="row" style="margin: 3vh; margin-top: 5vh;">
                        <form action="reporte.php" method="GET" class="formulario" target="_blank">
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" title="Ingrese un apellido" name="buscar" placeholder="Buscar por apellido" style="width: 80%;" required>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-light button" style="border-radius: 50px 50px 50px 50px; width: 45%;">Imprimir</button>
                                </div>
                                <?php

                                if (isset($_GET["mensaje"])) {
                                    switch ((int) $_GET["mensaje"]) {
                                        case 1:
                                            echo '<div class="col-4 alert alert-info" role="alert" style="height: 2vh; margin-left: -10%;"><center>';
                                            echo '<p style="transform: translateY(-50%);">Creación con Éxito!</p>';
                                            echo '</center></div>';
                                            break;
                                        case 2:
                                            echo '<div class="col-4 alert alert-success" role="alert" style="height: 2vh; margin-left: -10%;"><center>';
                                            echo '<p style="transform: translateY(-50%);">Modificación con Éxito!</p>';
                                            echo '</center></div>';
                                            break;
                                        case 3:
                                            echo '<div class="col-4 alert alert-warning" role="alert" style="height: 2vh; margin-left: -10%;"><center>';
                                            echo '<p style="transform: translateY(-50%);">Registro Eliminado</p>';
                                            echo '</center></div>';
                                            break;
                                        default:
                                            echo (int) $_GET["mensaje"];
                                            break;
                                    }
                                }

                                ?>

                                <!-- <div class="col-4 alert alert-success" role="alert" style="height: 2vh; margin-left: -10%;"><center><p style="transform: translateY(-50%);">Creacion con Exito!</p></center></div> -->
                            </div>
                        </form>
                        <form action="crud.php?action=Crear">
                            <div class="row">
                                <div class="col-3 offset-3" style="margin-right: -10%; margin-bottom: -5%; transform: translateX(200%); margin-top: -3%;">
                                    <div class="container-fluid">
                                        <button type="submit" class="btn btn-light button" style="border-radius: 50px 50px 50px 50px; width: 50%;">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" title="Ingrese un apellido"
                     placeholder="Buscar por apellido" style="width: 20%; margin: 5vh; margin-bottom: 1%;"> -->
                    <table class="table table-secondary table-hover" id="myTable" style="width: 90%; display: block; height: 40vh; overflow: auto;">
                        <thead>
                            <tr>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;">#</th>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;">Nombre</th>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;">Apellido</th>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;">Ciudad</th>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;">Fecha de Inscripccion</th>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;">E-mail</th>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;"></th>
                                <th scope="col" id="tabla" style="position: sticky; top: 0;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include_once('../controller/registro_controlador.php'); ?>
                        </tbody>
                    </table>
                    <form action="crud.php?action=<?php echo $_GET["action"]; ?>" method="GET">
                        <div class="container-fluid">
                            <div class="row" style="margin-top: 2vh;">
                                <div class="col-3">
                                    <!--Nombre-->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style=" height: 100%;">Nombre</span>
                                        </div>
                                        <input type="name" class="form-control" placeholder="Ingrese un nombre" name="nombre" value="<?php echo @$getId["Nombre"]; ?>" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <!--Apellido-->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style=" height: 100%;">Apellido</span>
                                        </div>
                                        <input type="lastname" class="form-control" placeholder="Ingrese un apellido" name="apellido" value="<?php echo @$getId["Apellido"]; ?>" required>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <!--Fecha-->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="height: 100%;">Fecha</span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="Ingrese una fecha" name="fecha" value="<?php echo @$getId["FechaInscripcion"]; ?>" required>
                                    </div>
                                </div>
                                <div class="col offset-1">
                                    <!-- <button type="submit" class="btn btn-light button" style="border-radius: 50px 50px 50px 50px; width: 50%;"></button> -->
                                    <input type="submit" class="btn btn-light button" style="border-radius: 50px 50px 50px 50px; width: 50%;" name="action" value="<?php echo $_GET["action"]; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <!--Ciudad-->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style=" height: 100%;">Ciudad</span>
                                        </div>
                                        <input type="city" class="form-control" placeholder="Ingrese una ciudad" name="ciudad" value="<?php echo @$getId["Ciudad"]; ?>" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <!--Email-->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="height: 100%;">E-mail</span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Ingrese un e-mail" name="email" value="<?php echo @$getId["Email"]; ?>" required>
                                    </div>
                                </div>
                                <div class="invisible">
                                    <!--Accion-->
                                    <input type="none" class="form-control" name="id" <?php
                                                                                        echo ' value="' . $_GET['id'] . '" ';
                                                                                        ?>>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script src="../js/funciones.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
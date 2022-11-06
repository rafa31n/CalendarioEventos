<?php
require_once('../libs/conexion.php');
require_once("../models/model.eventos.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Mis eventos</title>
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../public/css/fontello.css">

</head>

<body>
    <?php
    include_once('navbar.php');
    ?>
    <div class="contenedor-eventos">
        <h1 class="text-center titulo">Mis eventos</h1>
        <?php
        date_default_timezone_set("America/El_Salvador");
        $fecha = date("Y/m/d");
        ?>
        <div class="hoy">
            <h4>Hoy > <?php echo $fecha; ?></h4>
            <hr>
            <?php
            $cn = Database::connect();
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $cn->prepare("SELECT * FROM eventos WHERE username = ? AND fecha = ?");
            $query->execute(array($_SESSION['username'], $fecha));
            $count = $query->rowCount();
            $resultado = $query->fetchAll();
            Database::disconnect();
            ?>
            <?php
            if ($count >= 1) {
                foreach ($resultado as $res) {
                    echo '<p><b>Titulo: </b>' . $res['titulo'] . '</p>';
                    echo '<p><b>Descipción: </b>' . $res['descripcion'] . '</p>';
                    echo '<a class="btn btn-light acciones" href="modificar.evento.php?id_evento=' . $res['id_evento'] . '"><i class="icon-pencil"></i></a>';
                    echo '<a class="btn btn-light acciones" href="eliminar.evento.php?id_evento=' . $res['id_evento'] . '"><i class="icon-trash"></i></a>';
                    echo '<hr>';
                }
            } else {
                echo "No hay eventos para el día de hoy.";
            }
            ?>
        </div>
    </div>

    <div class="proximos">
        <h4>Proximos eventos</h4>
        <hr>
        <?php
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("SELECT * FROM eventos WHERE username = ? AND fecha != ? ORDER BY fecha ASC");
        $query->execute(array($_SESSION['username'], $fecha));
        $count = $query->rowCount();
        $resultado = $query->fetchAll();
        Database::disconnect();
        ?>
        <?php
        if ($count >= 1) {
            foreach ($resultado as $res) {
                echo '<h5><b>Fecha: </b>' . $res['fecha'] . '</h5>';
                echo '<p><b>Titulo: </b>' . $res['titulo'] . '</p>';
                echo '<p><b>Descipción: </b>' . $res['descripcion'] . '</p>';
                echo '<a class="btn btn-light acciones" href="modificar.evento.php?id_evento=' . $res['id_evento'] . '"><i class="icon-pencil"></i></a>';
                echo '<a class="btn btn-light acciones" href="eliminar.evento.php?id_evento=' . $res['id_evento'] . '"><i class="icon-trash"></i></a>';
                echo '<hr>';
            }
        } else {
            echo "No hay eventos para el día de hoy.";
        }
        ?>
    </div>
    <div class="mensaje">
        <?php
        # si hay un mensaje, mostrarlo
        if (isset($_GET["mensaje"])) { ?>
            <div class="alert alert-info">
                <?php echo $_GET["mensaje"] ?>
            </div>
        <?php } ?>
    </div>
    </div><br>
</body>

</html>
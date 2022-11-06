<?php
require_once('../libs/conexion.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Agregar evento</title>
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css">
</head>

<body>
    <?php
    include_once('navbar.php');
    ?>
    <div class="contenedor">
        <div class="form">
            <h1 class="text-center">Agregar un evento</h1>

            <form action="../controllers/controller.agregar.evento.php" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="titulo">Ingrese el titulo del evento: </label>
                    <input class="form-control" type="text" name="titulo" id="titulo" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="descripcion">Ingrese la descripción del evento:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fecha">Ingrese la fecha del evento:</label>
                    <input class="form-control" type="date" name="fecha" id="fecha" required>
                </div>

                <button type="submit" class="btn btn-success">Agregar</button>
            </form>
            <?php
            # si hay un mensaje, mostrarlo
            if (isset($_GET["mensaje"])) { ?>
                <div class="alert alert-info">
                    <?php echo $_GET["mensaje"] ?>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>
<?php
require_once('../libs/conexion.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

$id = $_GET['id_evento'];

$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM eventos WHERE id_evento = ?");
$query->execute(array($id));
$count = $query->rowCount();
$resultado = $query->fetchAll();
Database::disconnect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Eliminar evento</title>
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css">
</head>

<body>
    <?php
    include_once('navbar.php');
    foreach ($resultado as $res) {
    ?>
        <div class="contenedor">
            <div class="form">
                <h1 class="text-center" style="margin-top: 15px;">Eliminar el evento:</h1>
                <h1 class="text-center" style="color:#69a6d1;"><?php echo $res['titulo']; ?></h1><br>

                <form action="../controllers/controller.eliminar.evento.php" method="POST">
                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="id_evento" id="id_evento" value="<?php echo $res['id_evento']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="titulo">Titulo del evento: </label>
                        <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $res['titulo']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="descripcion">Descripción del evento:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" readonly><?php echo $res['descripcion']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="fecha">Fecha del evento:</label>
                        <input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo $res['fecha']; ?>" readonly>
                    </div>

                    <button type="submit" class="btn btn-danger">Eliminar</button>
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
    <?php
    }
    ?>
</body>

</html>
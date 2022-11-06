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
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css">
    <title>Dashboard</title>
</head>

<body>
    <?php
    include_once('navbar.php');
    ?>

    <h1 class="text-center titulo">¡Bienvenido(a)!</h1>
    <h1 class="text-center" style="color:#69a6d1;"><?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?></h1>

    <div class="contenedor">
        <div class="box">
            <img src="../public/img/agregar_evento.png" alt="">
            <p><a href="agregar.evento.php">Agregar un evento</a></p>
        </div>
        <div class="box">
            <img src="../public/img/evento.png" alt="">
            <p><a href="eventos.php">Ver mis eventos</a></p>
        </div>
        <div class="box">
            <img src="../public/img/user.png" alt="">
            <p><a href="perfil.php">Mi cuenta</a></p>
        </div>
    </div>
</body>

</html>
<?php
require_once('../libs/conexion.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

$cn = Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM usuarios WHERE username = ?");
$query->execute(array($_SESSION['username']));
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
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css">
    <title>Mi perfil</title>
</head>

<body>
    <?php
    include_once('navbar.php');
    ?>

    <div class="contendedor">
        <div class="contenido">
            <h1 class="text-center">Modificar información</h1><br>
            <form action="../controllers/controller.usuarios.php" method="POST">
                <?php
                foreach ($resultado as $res) {
                ?>
                    <div class="form-group mt-3">
                        <label class="form-label" for="name">Nombres</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $res['nombres']; ?>" required>
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label" for="lastname">Apellidos</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $res['apellidos']; ?>" required>
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label" for="username">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $res['username']; ?>" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label" for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $res['contrasenia']; ?>" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <label class="form-label" for="email">Correo</label>
                        <input type="mail" class="form-control" name="email" value="<?php echo $res['correo']; ?>" required>
                    </div><br>

                    <button type="submit" class="form-control btn btn-success rounded submit px-3">Modificar información</button>
                <?php
                }
                ?>
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
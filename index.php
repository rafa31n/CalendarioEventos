<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/styles.css" type="text/css">
    <title>Login</title>
</head>

<body>
    <div class="contenedor-index">
        <div class="contenido">
            <h1 class="text-center">Login</h1>
            <form action="controllers/controller.login.php" method="POST">
                <label for="username" class="form-label">Nombre de usuario</label><br>
                <input class="form-control" type="text" name="username" id="username" required><br>

                <label for="password" class="form-label">Contraseña:</label><br>
                <input class="form-control" type="password" name="password" required><br><br>

                <button type="submit" class="btn btn-success">Ingresar</button>

            </form>
            <p class="text-center">¿No tienes cuenta? <a href="views/registrar.usuario.php" style="color: #003166;">Registrate aquí</a></p>
            <br>
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
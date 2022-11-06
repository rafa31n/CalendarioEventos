<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css">
    <title>Registrarse</title>
</head>

<body>
    <div class="contenedor-index">
        <div class="contenido">
            <h1 class="text-center">Nuevo usuario</h1>
            <form action="../controllers/controller.registrarse.php" class="signin-form" method="POST">
                <div class="form-group mt-3">
                    <label class="form-label" for="username">Nombre de usuario</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label" for="name">Nombres</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label" for="lastname">Apellidos</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label" for="email">Correo</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label" for="password">Contraseña</label>
                    <input id="password-field" type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group mt-3">
                    <label class="form-label" for="passwordagain">Repetir contraseña</label>
                    <input id="password-field" type="password" class="form-control" name="passwordagain" required>
                </div>
                <br>
                <div class="form-group mt-3">
                    <input type="submit" class="form-control btn btn-primary rounded submit px-3" value="Registrarme">
                </div>
            </form><br>
            <p class="text-center">¿Ya tienes cuenta? <a href="../index.php" style="color: #003166;">Ingresa aquí</a></p>
        </div>
    </div>


    <?php
    # si hay un mensaje, mostrarlo
    if (isset($_GET["mensaje"])) { ?>
        <div class="alert alert-info">
            <?php echo $_GET["mensaje"] ?>
        </div>
    <?php } ?>


    <script src="resources/login-register/js/jquery.min.js"></script>
    <script src="resources/login-register/js/popper.js"></script>
    <script src="resources/login-register/js/bootstrap.min.js"></script>
    <script src="resources/login-register/js/main.js"></script>

</body>

</html>
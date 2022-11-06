<?php
require_once("../models/model.usuarios.php");
require_once("../libs/conexion.php");

if (
    isset($_POST['contraActual']) && isset($_POST['nuevaContra1']) && isset($_POST['nuevaContra2'])
) {
    $contraActual = trim($_POST['contraActual']);
    $nuevaContra1 = trim($_POST['nuevaContra1']);
    $nuevaContra2 = trim($_POST['nuevaContra2']);
    $username = trim($_POST['username']);

    if ($contraActual == "" || $nuevaContra1 == "" || $nuevaContra2 == "") {
        header("Location: ../views/cambiar.contra.php?mensaje=Los campos se encuentran vacios.");
    } else {
        if ($nuevaContra1 == $nuevaContra2) {
            $usuarios = new Usuarios();
            $modificar = $usuarios->cambiarContra($nuevaContra1, $username);

            if ($modificar) {
                $url = '../views/cambiar.contra.php?mensaje=Cambios guardados con exito.';
                header("Location: $url");
            } else {
                header("Location: ../views/cambiar.contra.php?mensaje=No se pudieron realizar los cambios.");
            }
        } else {
            header("Location: ../views/cambiar.contra.php?mensaje=Las contraseñas no coinciden.");
        }
    }
}

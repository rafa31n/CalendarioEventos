<?php
require_once("../models/model.usuarios.php");
require_once("../libs/conexion.php");

if (
    isset($_POST['username']) && isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email'])
) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    //$password = $_POST['password'];
    //$passwordagain = $_POST['passwordagain'];

    if ($username == "" || $name == "" || $lastname == "" || $email == "") {
        header("Location: ../views/modificar.usuarios.php?mensaje=Los campos se encuentran vacios.");
    } else {
        $usuarios = new Usuarios();
        $modificar = $usuarios->modificarUsuario($username, $name, $lastname, $email);

        if ($modificar) {
            $url = '../views/perfil.php?mensaje=Cambios guardados con exito.';
            header("Location: $url");
        } else {
            header("Location: ../views/perfil.php?mensaje=No se pudieron realizar los cambios.");
        }
    }
}

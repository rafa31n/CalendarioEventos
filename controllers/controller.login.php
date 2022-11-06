<?php
require_once("../models/model.usuarios.php");
require_once("../libs/conexion.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "" || $password == "") {
        header("Location: ../index.php?mensaje=Los campos se encuentran vacios.");
    } else {
        $usuarios = new Usuarios();
        $login = $usuarios->login($username, $password);

        if ($login) {
            $url = '../views/dashboard.php';
            header("Location: $url");
        } else {
            header("Location: ../index.php?mensaje=El usuario o la contraseña son incorrectas.");
        }
    }
}

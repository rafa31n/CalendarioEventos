<?php
require_once("../models/model.usuarios.php");
require_once("../libs/conexion.php");

if (
    isset($_POST['username']) && isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['passwordagain'])
) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordagain = $_POST['passwordagain'];

    if ($username == "" || $name == "" || $lastname == "" || $email == "" || $password == "") {
        header("Location: ../views/registrar.usuario.php?mensaje=Los campos se encuentran vacios.");
    } else {

        if ($password == $passwordagain) {
            $usuarios = new Usuarios();
            $register = $usuarios->register($username, $name, $lastname, $email, $password);

            if ($register) {

                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['lastname'] = $lastname;

                $url = '../views/dashboard.php';
                header("Location: $url");
            } else {
                header("Location: ../views/registrar.usuario.php?mensaje=Ya existe un usuarios con ese username.");
            }
        } else {
            header("Location: ../views/registrar.usuario.php?mensaje=Las contraseñas no coinciden.");
        }
    }
}

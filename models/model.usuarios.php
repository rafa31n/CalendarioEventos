<?php

class Usuarios
{
    public function login($username, $password)
    {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("SELECT * FROM usuarios WHERE username = ?");
        $query->execute(array($username));
        $count = $query->rowCount();
        $data = $query->fetch();

        if ($count == 1 && password_verify($password, $data['contrasenia'])) {
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['name'] = $data['nombres'];
            $_SESSION['lastname'] = $data['apellidos'];
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

    public function register($username, $name, $lastname, $email, $password)
    {
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("SELECT * FROM usuarios WHERE username = ? OR correo = ?");
        $query->execute(array($username, $email));
        $count = $query->rowCount();

        if ($count < 1) {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $query2 = $cn->prepare("INSERT INTO usuarios(username,nombres,apellidos,correo,contrasenia) VALUES (?,?,?,?,?)");
            $query2->execute(array($username, $name, $lastname, $email, $pass));
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }

    public function modificarUsuario($username, $name, $lastname, $email)
    {
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("UPDATE usuarios SET nombres=?,apellidos=?,correo=? WHERE username = ?");
        $query->execute(array($name, $lastname, $email, $username));
        $count = $query->rowCount();

        if ($count == 1) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }

    public function cambiarContra($nuevaContra1, $username)
    {
        $pass = password_hash($nuevaContra1, PASSWORD_DEFAULT);
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("UPDATE usuarios SET contrasenia=? WHERE username = ?");
        $query->execute(array($pass, $username));
        $count = $query->rowCount();

        if ($count == 1) {
            return true;
        } else {
            return false;
        }

        Database::disconnect();
    }
}

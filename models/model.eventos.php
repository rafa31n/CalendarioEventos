<?php

class Eventos
{
    function agregar($titulo, $descripcion, $fecha, $username)
    {
        $id_evento = null;
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("INSERT INTO eventos VALUES (?,?,?,?,?)");
        $query->execute(array($id_evento, $titulo, $descripcion, $fecha, $username));
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

    function mostrarEventos($username)
    {
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("SELECT * FROM eventos WHERE username = ?");
        $query->execute(array($username));
        $count = $query->rowCount();
        $resultado = $query->fetch();
        if ($count == 1) {
            return $resultado;
        } else {
            return false;
        }
        Database::disconnect();
    }

    function modificar($titulo, $descripcion, $fecha, $id_evento)
    {
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("UPDATE eventos SET titulo = ?, descripcion =?, fecha = ? WHERE id_evento = ?");
        $query->execute(array($titulo, $descripcion, $fecha, $id_evento));
        $count = $query->rowCount();
        $resultado = $query->fetch();

        if ($count == 1) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }

    function eliminar($id)
    {
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("DELETE FROM eventos WHERE id_evento = ?");
        $query->execute(array($id));
        $count = $query->rowCount();
        $resultado = $query->fetch();

        if ($count == 1) {
            return true;
        } else {
            return false;
        }
        Database::disconnect();
    }
}

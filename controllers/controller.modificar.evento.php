<?php
require_once("../models/model.eventos.php");
require_once("../libs/conexion.php");
session_start();

if (isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['fecha'])) {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $fecha = trim($_POST['fecha']);
    $id_evento = trim($_POST['id_evento']);

    if ($titulo == "" || $descripcion == "" || $fecha == "") {
        header("Location: ../views/modificar.evento.php?mensaje=Los campos se encuentran vacios.");
    } else {
        $eventos = new Eventos();
        $modificar = $eventos->modificar($titulo, $descripcion, $fecha, $id_evento);

        if ($modificar) {
            $url = '../views/eventos.php?mensaje=El evento ha sido modificado correctamente.';
            header("Location: $url");
        } else {
            header("Location: ../eventos.php?mensaje=No se ha podido modificar el evento.");
        }
    }
}

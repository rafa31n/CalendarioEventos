<?php
require_once("../models/model.eventos.php");
require_once("../libs/conexion.php");
session_start();

if (isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['fecha'])) {
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $fecha = trim($_POST['fecha']);

    if ($titulo == "" || $descripcion == "" || $fecha == "") {
        header("Location: ../views/agregar.evento.php?mensaje=Los campos se encuentran vacios.");
    } else {
        $eventos = new Eventos();
        $agregar = $eventos->agregar($titulo, $descripcion, $fecha, $_SESSION['username']);

        if ($agregar) {
            $url = '../views/eventos.php?mensaje=El evento ha sido agregado correctamente.';
            header("Location: $url");
        } else {
            header("Location: ../agregar.evento.php?mensaje=No se pudo agregar el evento.");
        }
    }
}

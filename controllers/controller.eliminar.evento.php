<?php
require_once("../models/model.eventos.php");
require_once("../libs/conexion.php");


if (isset($_POST['id_evento'])) {
    $id = $_POST['id_evento'];

    $eventos = new Eventos();
    $eliminar = $eventos->eliminar($id);

    if ($eliminar) {
        $url = '../views/eventos.php?mensaje=El evento ha sido eliminado correctamente.';
        header("Location: $url");
    } else {
        header("Location: ../eventos.php?mensaje=No se ha podido eliminar el evento.");
    }
}

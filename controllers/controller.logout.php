<?php
session_start();
require_once('../libs/conexion.php');

session_unset();
session_destroy();

$url = '../index.php';
header("Location: $url");

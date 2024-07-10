<?php
session_start();
require_once 'conexion.php';

$usuario_id = $_SESSION['id'];
$rutinaId = $_POST['rutina_id'];

$sql = "INSERT INTO progreso (usuario_id, rutina_id, leccion_actual) VALUES ($usuario_id, $rutinaId, 0)";
$conn->query($sql);

header("Location: ../index.php");
exit;
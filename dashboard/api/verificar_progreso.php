<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

$usuarioId = $_SESSION['id'];

// Obtener la rutina y lección actual del usuario
$sql = "SELECT rutinas.id AS rutina_id, progreso.leccion_actual
        FROM progreso
        JOIN rutinas ON progreso.rutina_id = rutinas.id
        WHERE progreso.usuario_id = $usuarioId";

$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $leccionActual = $row['leccion_actual'];
    $rutinaId = $row['rutina_id'];

    // Devolver la lección actual y el ID de la rutina
    echo json_encode([
        'leccion_actual' => $leccionActual,
        'rutina_id' => $rutinaId
    ]);
} else {
    // No hay rutina en progreso, indicar al frontend que no hay lección actual
    echo json_encode(['leccion_actual' => null]); // Puedes usar null o -1 para indicar que no hay lección
}
?>
<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $rutinaId = $_GET['id'];

    $sqlRutina = "SELECT * FROM rutinas WHERE id = $rutinaId";
    $resultadoRutina = $conn->query($sqlRutina);

    if ($resultadoRutina && $resultadoRutina->num_rows > 0) {
        $rutina = $resultadoRutina->fetch_assoc();

        // Obtener las lecciones de la rutina
        $sqlLecciones = "SELECT * FROM lecciones WHERE rutina_id = $rutinaId";
        $resultadoLecciones = $conn->query($sqlLecciones);
        $rutina['lecciones'] = [];
        while ($row = $resultadoLecciones->fetch_assoc()) {
            $rutina['lecciones'][] = $row;
        }

        echo json_encode($rutina);
    } else {
        echo json_encode(['error' => 'Rutina no encontrada']);
    }
} else {
    echo json_encode(['error' => 'ID de rutina no proporcionado']);
}

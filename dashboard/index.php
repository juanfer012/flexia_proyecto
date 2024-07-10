<?php
session_start();
require_once 'api/conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id'])) {
    header("Location: ../"); // Reemplaza 'login.php' con la ruta correcta
    exit;
}

$usuarioId = $_SESSION['id'];

// Obtener la rutina y lección actual del usuario (combinando ambas consultas)
$sql = "SELECT rutinas.nombre AS rutina_nombre, rutinas.descripcion AS rutina_descripcion, progreso.leccion_actual, rutinas.id AS rutina_id
        FROM progreso
        JOIN rutinas ON progreso.rutina_id = rutinas.id
        WHERE progreso.usuario_id = $usuarioId";

$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $rutina = $resultado->fetch_assoc();
    $mostrarBotonEmpezar = true;

    $progresoHTML = '';
    $sqlNumLecciones = "SELECT COUNT(*) as total FROM lecciones WHERE rutina_id = {$rutina['rutina_id']}";
    $resultadoNumLecciones = $conn->query($sqlNumLecciones);
    $numLecciones = $resultadoNumLecciones->fetch_assoc()['total'];

    for($i = 1; $i <= $numLecciones; $i++){
        $clase = ($i <= $rutina['leccion_actual'] + 1) ? 'completed' : '';
        $progresoHTML .= '<div class="progress-step ' .$clase . '">' . $i . '</div>';
    }
} else {
    // No hay rutina en progreso, mostrar botón para elegir rutina
    $mostrarBotonEmpezar = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de ejercicios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   <?php include 'sidebar.php' ?>


   <main>
   <section class="current-challenge">
   <?php if ($mostrarBotonEmpezar): ?>
            <h2><?php echo $rutina['rutina_nombre']; ?></h2>
            <p><?php echo $rutina['rutina_descripcion']; ?></p>
            <div class="challenge-progress">
                <?php echo $progresoHTML  ?>
            </div>
            <button class="start-button"><a class="a-button" href="./openpose/?rutina_id=<?php echo $rutina['rutina_id']; ?>&leccion_actual=<?php echo $rutina['leccion_actual']; ?>">Empezar</a></button>
        <?php else: ?>
            <h2>No hay rutina en progreso</h2>
            <button class="start-button"><a class="a-button" href="./rutinas/">Escoger Rutina</a></button>
        <?php endif; ?>
    </section>
    <section class="sidebar-content">
        <div class="sidebar-box">
            <h3>Motivate!!</h3>
            <p>Haz tu rutina diaria para sentirte mas fuerte, mas feliz</p>
        </div>
        <div class="sidebar-box">
            <h3>Mantente ejercitado</h3>
            <p>Nuestra plataforma te motivara a realizar movimiento fisico</p>
        </div>
        <div class="sidebar-box">
            <h3>Haz 10 repeticiones de una leccion aleatoria</h3>
            <p>Gana 10 EXP</p>
        </div>
    </section>
</main>


<script>
    function mostrarAlerta() {
    alert("¡Espera a que te asignemos una rutina !");
}
   </script>

   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <script src="./sidebar.js"></script>
</body>
</html>
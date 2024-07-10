<?php
session_start();
require_once "../api/conexion.php";

$sql = "SELECT * FROM rutinas";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escoge tu rutina</title>
</head>
<body>
    <h2>Escoge tu rutina</h2>
    <div class="rutinas-container">
        <?php while($rutina = $resultado->fetch_assoc()): ?>
            <div class="rutina-card">
                <h3><?php echo $rutina['nombre']; ?></h3>
                <p><?php echo $rutina['descripcion']; ?></p>
                <form action="../api/aisgnar_rutina.php" method="POST">
                    <input type="hidden" name="rutina_id" value="<?php echo $rutina['id']; ?>">
                    <button type="submit">Comenzar rutina</button>
                </form>
            </div>

            <?php endwhile; ?>
    </div>
</body>
</html>
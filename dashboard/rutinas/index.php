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
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="navbar">
        <div class="navbar-left">
            
        </div>
        <div class="navbar-right">
            <span class="user-name"></span>
        </div>
    </div>

    <main>
        <h1 class="main-title">Rutinas</h1>
        <div class="cards-container">
            <?php while($rutina = $resultado->fetch_assoc()): ?>
                <div class="card">
                    <h2 class="card-title"><?php echo $rutina['nombre']; ?></h2>
                    <p class="card-description"><?php echo $rutina['descripcion']; ?></p>
                    <form action="../api/asignar_rutina.php" method="post">
                        <input type="hidden" name="rutina_id" value="<?php echo $rutina['id']; ?>">
                        <button type="submit" class="card-button">Comenzar</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
</html>
<?php
session_start();  // Inicia la sesión al comienzo del script

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flexia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE email=?");  // Obtiene el ID del usuario
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $row['id'];  // Almacena el ID del usuario en la sesión
            // Redirige a la página protegida:
            header("Location: ../dashboard"); // Reemplaza con tu página real
            exit();
        } else {
            $error = "Nombre de usuario o contraseña incorrectos.";
            echo "Error:" . $error;
        }
    } else {
        $error = "Nombre de usuario o contraseña.";
        echo "Error:" . $error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button><a href="../">Volver al home</a></button>
</body>
</html>
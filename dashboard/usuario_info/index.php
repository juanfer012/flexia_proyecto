<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
  header("Location: ../index.html");
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flexia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario_id = $_SESSION['id'];
$sql = "SELECT * FROM usuarios WHERE id = $usuario_id";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
}else{
    echo "Usuario no encontrado";
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nuevosIntereses = isset($_POST['generos']) ? $_POST['generos'] : [];
    $interesesCadena = implode(',', $nuevosIntereses);
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $telefono_aux = $_POST['telefono_aux'];
    $fecha = $_POST['date'];
    $edad = $_POST['edad'];
    $nombre_completo = $_POST['nombre_completo'];

    if(empty($cedula) || empty($telefono) || empty($telefono_aux) || empty($edad)){
        echo "<p class='error'>Por favor, complete todos los campos correctamente.</p>";
    }else{
        $sql = "UPDATE usuarios SET nombre_completo='$nombre_completo', cedula='$cedula', numero='$telefono', genero='$interesesCadena', numero_aux='$telefono_aux', fecha_nac='$fecha', edad='$edad' WHERE id=$usuario_id";

        if($conn->query($sql) === true){
            echo "<p class='success'>Perfil actualizado correctamente.</p>";

        }else{
            echo "<p class='success'>Perfil no.</p>";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info - <?php echo $row['nombre_completo'] ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2>Formulario</h2>
        <form action="./" method="post">
            <div class="form-group">
                <label for="name">Usuario</label>
                <input type="text" id="name" name="name" placeholder="Ingrese su nombre" disabled value="<?php echo $row['username'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" id="nombre_completo" name="nombre_completo" placeholder="Ingrese su nombre" value="<?php echo $row['nombre_completo'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico" disabled value="<?php echo $row['email'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Cedula</label>
                <input type="text" id="cedula" name="cedula" placeholder="Ingrese su cedula" value="<?php echo $row['cedula'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Numero de telefono</label>
                <input type="text" id="numero" name="telefono" placeholder="Ingrese su telefono" value="<?php echo $row['numero'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Numero de telefono auxiliar</label>
                <input type="text" id="numero_aux" name="telefono_aux" placeholder="Ingrese su telefono" value="<?php echo $row['numero_aux'] ?>">
            </div>
            <div class="form-group">
                <label for="generos">Genero</label>
                <select name="generos[]" value="<?php echo $row['genero'] ?>">
                    <option value="masculino" >Masculino</option>
                    <option value="femenino"  >Femenino</option>
                    <option value="binario"  >Prefiero no decirlo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Fecha de nacimiento</label>
                <input type="date" id="fecha" name="date" placeholder="Ingrese su fecha de nacimiento" value="<?php echo $row['fecha_nac'] ?>">
            </div>
            <div class="form-group">
                <label for="name">Edad</label>
                <input type="number" id="fecha" name="edad" placeholder="Ingrese su fecha de nacimiento" value="<?php echo $row['edad'] ?>">
            </div>
            <button type="submit">Guardar cambios</button>
        </form>
    </div>
    <a href="javascript:history.back()" class="back-button">Volver Atrás</a>
</body>
</html>
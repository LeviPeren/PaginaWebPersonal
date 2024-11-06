<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$password = "1234";
$base_datos = "logosolicitud";

// Conectar a la base de datos
$conn = new mysqli($servidor, $usuario, $password, $base_datos);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Verificar si el usuario o correo ya existe
    $sql = "SELECT * FROM usuarios WHERE username='$username' OR email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO usuarios (username, password, email) VALUES ('$username', '$password', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso. Puedes iniciar sesión ahora.";
            header("Location: login.php");
            exit();
        } else {
            echo "<p class='error'>Error al registrar el usuario: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error'>El nombre de usuario o correo ya están en uso.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="register-body">
    <div class="register-container">
        <h2>Registro de Usuario</h2>
        <form method="post" action="registro.php">
            <label for="username">Usuario:</label>
            <input type="text" name="username" required>
            
            <label for="email">Correo:</label>
            <input type="email" name="email" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <input type="submit" value="Registrar" class="btn-submit">
            <a href="login.php" class="btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>

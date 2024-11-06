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
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit();
        } else {
            echo "<p class='error'>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p class='error'>Usuario no encontrado.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="post" action="login.php">
            <label for="username">Usuario:</label>
            <input type="text" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Ingresar" class="btn-login">
            <a href="index.php" class="btn-cancel">Cancelar</a>
        </form>
        <p>¿No tienes una cuenta? <a href="registro.php" class="btn-register">Registrarse</a></p>
    </div>
</body>
</html>

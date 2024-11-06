<?php
// Habilita la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de la base de datos
$host = 'localhost';  // Cambia si es necesario
$dbname = 'logosolicitud';  // Nombre de la base de datos actualizado
$username = 'root';  // Cambia si es necesario
$password = '';  // Cambia si es necesario

try {
    // Intentar la conexión
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";  // Mensaje de éxito
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();  // Mensaje de error
}
?>

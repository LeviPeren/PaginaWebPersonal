<?php
    // Incluir archivo de conexión
    include_once "conexion.php";
    
    // Procesar el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores del formulario
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $descripcion = $_POST["descripcion"];

        // Verificar si la conexión a la base de datos es exitosa
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Consulta SQL usando prepared statements (mejor práctica)
        //$sql = $conn->prepare("INSERT INTO solicitud (Nombre, Telefono, Correo, Descripcion) VALUES (?, ?, ?, ?)");
        //$sql->bind_param("ssss", $nombre, $telefono, $correo, $descripcion); // 'ssss' indica que son 4 strings
        
        $sql = "INSERT INTO solicitud (Nombre, Telefono, Correo, Descripcion) VALUES ('$nombre', '$telefono', '$correo', '$descripcion')";

        if ($conn->query($sql) === TRUE) {

        // Ejecutar la consulta
        //if ($sql->execute()) {
            echo "Solicitud enviada correctamente";
        } else {
            echo "Error al enviar la solicitud: " . $conn->error;
        }   

        // Cerrar la conexión
        $sql->close();
        $conn->close();
    } else {
        echo "Método no permitido";
    }

?>

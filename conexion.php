<?php
    // Conectar las credenciales de la base de datos
    $servidor="localhost";
    $usuario="root";
    $password="1234";
    $base_datos="logosolicitud";

    // Conexion con MySQL
    $conn= new mysqli($servidor,$usuario,$password,$base_datos);
    
    // Revisar la conexion
    if($conn->connect_error){
        die("Error, no se conecto". $conn->connect_error);
    }//else{
       // echo "Conectado a MySQL";
    //}



?>
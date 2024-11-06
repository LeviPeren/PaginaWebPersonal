<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Incluir archivo de conexión
include_once "conexion.php";

// Consulta para obtener los registros de la tabla "solicitud"
$sql = "SELECT * FROM solicitud";
$result = $conn->query($sql);
?>



<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDEA</title>
    <!-- Estilos CSS -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="./logoicono.ico">

    <!-- Cargando fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Cargando Iconos -->
    <link rel="stylesheet" href="css/fontawesome-all.css" type="text/css">

    <!-- Carga de archivos CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="paginas-internas">

        <header class="encabezado fixed-top" role="banner" id="encabezado">
            <div class="container">
                <a href="index.php" class="logo">
                    <img src="images/logo.svg" alt="Logo del título">
                </a>                
                <button type="button" class="boton-menu d-md-none" data-toggle="collapse" data-target="#menu-principal" aria-expanded="false">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </button>
                <form action="#" id="bloque-buscar" class="collapse">
                    <div class="contenedor-bloque-buscar">
                        <input type="text" placeholder="Buscar...">
                        <input type="submit" value="Buscar">                        
                    </div>
                    
                </form>
                <nav id="menu-principal" class="collapse">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="nosotros.php">Nosotros</a></li>                        
                        <li><a href="contacto.php">Contacto</a></li>
                        <li><a href="chat.php">Chat</a></li>
                        <li class="active"><a href="admin.php">Admin</a></li>
                    </ul>
                </nav>
            </div>
            
        </header>        
        

    <div class="container mt-5">
        

        <h1 class="mb-4"><br></h1>

        <!-- Enlace de cerrar sesión -->
        <div class="logout-container">
        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        <span class="username">Usuario: <?php echo $_SESSION['username']; ?></span>            
        </div>



        <h1 class="mb-4"><br>Solicitudes Recibidas</h1>
        <!-- Verificar si hay resultados y mostrarlos en una tabla -->
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Solicitud</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["Nombre"]; ?></td>
                            <td><?php echo $row["Telefono"]; ?></td>
                            <td><?php echo $row["Correo"]; ?></td>
                            <td><?php echo $row["Descripcion"]; ?></td>
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se han encontrado registros.</p>
        <?php endif; ?>

        <!-- Cerrar la conexión -->
        <?php $conn->close(); ?>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br>

</body>
<footer class="piedepagina" role="contentinfo">
        <div class="container">
            <p><br>CURSO: ANÁLISIS DE SISTEMAS - SEMESTRE: VIII - SECCIÓN: B - NOMBRE: LEVÍ MISAEL PERÉN BAL - CARNÉ: 1990-21-1760</p>
            <ul class="redes-sociales">                
                <li><a href="https://api.whatsapp.com/send?phone=50230686760&text=¡Hola!%20Quisiera%20más%20información." target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                <li><a href="https:facebook.com." target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>                
                <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </footer>
</html>

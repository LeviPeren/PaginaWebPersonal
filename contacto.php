<?php
// Iniciar la sesión
session_start(); 

// Incluir archivo de conexión
include_once "conexion.php";

// Inicializar variable para mensaje
$message = '';

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar el CAPTCHA
    $captcha_input = $_POST['txtcaptcha'];

    if (isset($_SESSION['captcha']) && $captcha_input == $_SESSION['captcha']) {
        // CAPTCHA válido, obtener los valores del formulario
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $descripcion = $_POST["descripcion"];

        // Verificar si la conexión a la base de datos es exitosa
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Consulta SQL usando prepared statements (mejor práctica)
        $sql = $conn->prepare("INSERT INTO solicitud (Nombre, Telefono, Correo, Descripcion) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $nombre, $telefono, $correo, $descripcion); // 'ssss' indica que son 4 strings

        // Ejecutar la consulta
        if ($sql->execute()) {
            $message = "Solicitud enviada exitosamente";
        } else {
            $message = "Error al enviar la solicitud: " . $conn->error;
        }

        // Cerrar la conexión
        $sql->close();
        $conn->close();

        // Opcionalmente, eliminar el CAPTCHA de la sesión después de la validación
        unset($_SESSION['captcha']);
    } else {
        // CAPTCHA incorrecto
        $message = "Captcha incorrecto. Intenta de nuevo.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>IDEA</title>
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

    <section class="bienvenidos">
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
                        <li class="active"><a href="contacto.php">Contacto</a></li>
                        <li><a href="chat.php">Chat</a></li>
                        <li><a href="admin.php">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="texto-encabezado text-center">
            <div class="container">
                <h1 class="display-4 wow bounceIn">- I D E A -</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Estamos listos para ayudarte</p>
            </div>
        </div>
    </section>

    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-12 text-right">
                    <p></p>
                </div>
            </div>
        </div>
    </section>

    <main class="py-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-2"><br>Descríbanos tu IDEA<br><br></h2>
                    
                    <!-- Mostrar mensaje de éxito o error -->
                    <?php if ($message): ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                    <?php endif; ?>


                    <form action="contacto.php" method="POST" id="solicitudForm">
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">Nombre del Cliente</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label">Teléfono</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label">Correo Electrónico</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="correo" name="correo" placeholder="Ingrese su correo electrónico" required>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label">Descripción del Logotipo</label>
                            <div class="col-md-8">
                                <textarea class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Describe el logotipo que necesitas" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="txtcaptcha" class="col-md-4 col-form-label">Ingrese el código de seguridad</label>
                            <div class="col-md-8">
                                <img src="captcha.php" alt="CAPTCHA"><br><br>
                                <input type="text" name="txtcaptcha" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="Guardar">Enviar Solicitud</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <h3><br>Encuéntranos<br><br></h3>
                    <p><br><br>Dirección:<br>
                        3ra. Avenida "A" 0-67 zona 1 <br>
                        San Juan Comalapa, Chimaltenango.
                    </p>
                    <p>Teléfono: <br>
                        3068 6760
                    </p>
                    <p>Correo: <br>
                        creandoconidea@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </main>


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

    <!-- Cargando Scripts -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/estilos.js"></script>



</body>

</html>

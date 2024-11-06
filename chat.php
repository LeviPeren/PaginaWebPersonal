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
                        <li><a href="contacto.php">Contacto</a></li>
                        <li class="active"><a href="chat.php">Chat</a></li>
                        <li><a href="admin.php">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="texto-encabezado text-center">
            <div class="container">
                <h1 class="display-4 wow bounceIn">- I D E A -</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Escríbenos vía WhatsApp</p>
            </div>
        </div>
    </section>

    <main class="py-5" style="background-color: #f9f9f9; text-align: center;">
        <div class="container">
            <h3 class="h3 text-center font-weight-bold" style="color: #4a4a4a;">Recibe asesoría personalizada</h3>
            <h2 class="wow bounceIn" style="color: #333; margin: 20px 0;">WhatsApp</h2>

            <a href="https://api.whatsapp.com/send?phone=50230686760&text=¡Hola!%20Quisiera%20más%20información." target="_blank">
                <button class="fab fa-whatsapp" style="background-color: #25D366; color: white; border: none; padding: 20px 30px; font-size: 20px; border-radius: 6px; cursor: pointer; transition: background-color 0.3s;">
                    Escríbenos
                </button>
            </a>

            <!-- Imagen del Código QR -->
            <div style="margin-top: 20px;">
                <img src="images/whatsapp.png" alt="Código QR para WhatsApp" style="width: 200px; height: 200px;">
            </div>
        </div>


        <div class="chat-container">
            <div class="chat-box" id="chat-box">
                <?php
                    // Incluir archivo de conexión
                    include_once "conexion.php";

                    // Consulta para obtener los registros de la tabla "mensajes"
                    $consulta = "SELECT * FROM mensajes ORDER BY fecha ASC";
                    $result = $conn->query($consulta);

                    if ($result->num_rows > 0) {
                        while ($fila = $result->fetch_assoc()) {
                            echo "<div><strong>" . htmlspecialchars($fila['usuario']) . ":</strong> " . htmlspecialchars($fila['mensaje']) . "</div>";
                            if ($fila['respuesta']) {
                                echo "<div><strong>Bot:</strong> " . htmlspecialchars($fila['respuesta']) . "</div>";
                            }
                        }
                    }
                ?>
            </div>


            <form id="chat-form" method="POST" action="chat.php">
                <input type="text" name="mensaje" placeholder="Escribe tu mensaje aquí..." required>
                <button type="submit">Enviar</button>
            </form>

            <?php
                // Si el formulario fue enviado
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $usuario = "Usuario"; // Esto puede ser dinámico si tienes un sistema de login
                    $mensaje = $_POST['mensaje'];
                    $respuesta = generarRespuesta($mensaje); // Generar respuesta del bot

                    // Preparar consulta SQL para insertar el mensaje y la respuesta en la base de datos
                    $sql = "INSERT INTO mensajes (usuario, mensaje, respuesta) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $usuario, $mensaje, $respuesta);

                    // Ejecutar la consulta
                    if ($stmt->execute()) {
                        // Recargar la página para mostrar el nuevo mensaje y la respuesta
                        header("Location: chat.php");
                        exit;
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    // Cerrar el statement
                    $stmt->close();
                }

                // Función para generar una respuesta automática del chatbot
                function generarRespuesta($mensaje) {
                    // Convertir el mensaje a minúsculas para evitar problemas de mayúsculas
                    $mensaje = strtolower($mensaje);
                
                    // Opción 1: Contactos
                    if ($mensaje == '1') {
                        return "Teléfono: 30686760\nCorreo: idea@gmail.com\nDirección: San Juan Comalapa";
                    
                    // Opción 2: Servicios
                    } elseif ($mensaje == '2') {
                        return "Elige un servicio:\n1. Creación de logotipo\n2. Rediseño de logotipo";
                
                    // Opciones dentro del servicio
                    } elseif ($mensaje == '2.1') {
                        return "Has seleccionado Creación de logotipo. Podemos ayudarte a crear un logo único para tu marca.";
                    } elseif ($mensaje == '2.2') {
                        return "Has seleccionado Rediseño de logotipo. Te ayudamos a renovar tu logo existente.";
                    
                    // Opción 3: Asesoría
                    } elseif ($mensaje == '3') {
                        return "Cuéntanos en que podemos asesorarte";
                
                    // Opción 4: Salir
                    } elseif ($mensaje == '4') {
                        return "Gracias por contactarnos.";
                    
                    // Si el mensaje no coincide con ninguna opción
                    } elseif (stripos($mensaje, 'hola') !== false) {
                        return "¡Hola! ¿Cómo puedo ayudarte?\nSelecciona una opción:\n1. Contactos\n2. Servicios\n3. Asesoría\n4. Salir";
                    } else {
                        return "Por favor elige una opción: \n 1. Contactos \n 2. Servicios \n 3. Asesoría \n\n 4. Salir";
                    }
                }
                
            ?>
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

    <a class="ir-arriba" data-scroll href="#encabezado"><i class="fas fa-angle-up"></i></a>

    <!-- JS Scripts -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/scripts.js"></script>

</body>
</html>

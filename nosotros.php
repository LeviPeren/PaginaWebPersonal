<!doctype html>
<html lang="en">

<head>
    <title>IDEA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="./logoicono.ico">

    <!--Cargando fuentes-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!--Cargando Iconos-->
    <link rel="stylesheet" href="css/fontawesome-all.css" type="text/css">

    <!--carga de archivos css-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body class="paginas-internas">
    <!--Menu superior-->
    <section class="bienvenidos">
        <header class="encabezado fixed-top" role="banner" id="encabezado">
            <div class="container">
                <a href="index.php" class="logo">
                    <img src="images/logo.svg" alt="Logo del titulo">
                </a>                
                <button type="button" class="boton-menu d-md-none" data-toggle="collapse" data-target="#menu-principal" aria-expanded="false">
                   <i class="fas fa-bars" aria-hidden="true"></i>
               </button>

                <nav id="menu-principal" class="collapse">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li class="active"><a href="nosotros.php">Nosotros</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                        <li><a href="chat.php">Chat</a></li>
                        <li><a href="admin.php">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        
        <!--Titulo de pagina-->
        <div class="texto-encabezado text-center">
            <div class="container">
                <h1 class="display-4 wow bounceIn">- I D E A -</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">¿Quiénes somos? y ¿Qué hacemos?</p>
            </div>
        </div>
    </section>

    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <!--Solo para dejar una cinta-->
                <div class="col-12 text-right">
                    <p></p>
                </div>
            </div>
        </div>
    </section>

    <main class="py-1">
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <!--Texto fijo-->
                    <h2><br>IDEA | Tranforma lo que te rodea</h2>
                    <p><br>En IDEA, nos especializamos en dar vida a la identidad visual de las marcas a través de un enfoque integral y creativo. 
                        Ofrecemos servicios que incluyen la creación de logotipos únicos, la vectorización de gráficos para asegurar la 
                        calidad en todas las aplicaciones.</p>
                    <p><br>Nuestro objetivo es ayudar a las empresas a destacar, comunicar su mensaje de manera efectiva y construir una conexión 
                        sólida con su audiencia a través de un diseño visual impactante y memorable.<br><br></p>
                    <p>
                        <!--Componente de acordeon para la mision, visión y los valores-->
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h4 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" data-target="#tab-mision" aria-controls="collapseOne">
                                  Misión
                                </a>
                                    </h4>
                                </div>

                                <div id="tab-mision" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>
                                            Crear y transformar identidades visuales que reflejan la esencia de nuestros clientes, 
                                            ofreciendo soluciones de diseño personalizadas y de alta calidad, que potencien 
                                            la presencia y relevancia de nuestros clientes en el mercado.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h4 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#tab-vision" aria-controls="collapseTwo">
                                  Visión
                                </a>
                                    </h4>
                                </div>
                                <div id="tab-vision" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>
                                            Inspirar a entidades a comunicar su esencia de manera efectiva a través de un diseño único, 
                                            convirtiéndonos en el socio preferido para aquellos que buscan destacar y evolucionar en un mercado competitivo.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h4 class="mb-0">
                                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#tab-valores" aria-controls="collapseThree">
                                  Valores
                                </a>
                                    </h4>
                                </div>
                                <div id="tab-valores" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>
                                            Creatividad: Fomentamos la innovación y la originalidad en cada proyecto. <br><br>
                                            Calidad: Cuidamos cada detalle en nuestros diseños para hacerlos únicos.<br><br>
                                            Pasión: Amamos lo que hacemos y eso se refleja en los resultados que entregamos.<br><br>
                                            Integridad: Actuamos con transparencia y ética en todas nuestras relaciones.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </article>
                <aside class="col-12 col-md-4">
                    <img src="images/nosotros.svg" alt="Nosotros">
                </aside>
            </div>
        </div>
    </main>

    <!--Footer de página-->
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

    <a class="ir-arriba" data-scroll href="#encabezado"><i class="fas fa-arrow-circle-up" aria-hidden="true"></i></a>

    <!--Carga de archivos js-->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/sitio.js"></script>

</body>

</html>

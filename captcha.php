<?php
session_start(); // Iniciar la sesión

// Crear una imagen más grande
$imagen = imagecreate(120, 50); // Aumentar el tamaño de la imagen para mejor visibilidad

// Color de fondo
$fondo = imagecolorallocate($imagen, 126, 2, 153);
$texto = imagecolorallocate($imagen, 255, 255, 255);

// Creamos un valor aleatorio
$aleatorio = rand(100000, 999999);
$_SESSION['captcha'] = $aleatorio; // Almacenar el código en la sesión

// Rellenar imagen
imagefill($imagen, 0, 0, $fondo);

// Imprimir texto en la imagen con tamaño de fuente 6 (aumentado)
imagestring($imagen, 6, 10, 15, $aleatorio, $texto); // Ajustar la posición si es necesario

// Establecer el tipo de contenido
header('Content-type: image/png');

// Imprimir imagen
imagepng($imagen);

// Destruir la imagen para liberar memoria
imagedestroy($imagen);
?>

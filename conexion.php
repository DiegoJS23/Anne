<?php
//$var = "Hola Pepe";
//echo "<script> alert('".$var."'); </script>";

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDeDatos = "anne_peluqueria";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    if (!$enlace) {
        echo "Error en la conexion con el servidor";
    }
    
?>


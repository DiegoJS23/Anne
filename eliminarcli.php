<?php
include 'conexion.php';
$id = $_GET['id_cliente'];
$eliminar = "DELETE FROM cliente WHERE id_cliente = '$id'";
#pregunta si quiere eliminar el registro 
#continuar (si) cancelar (devuelvelo a la pagina busqueda) 
$elimina = $enlace->query($eliminar);
header("Location:BusquedaCli.php");
$enlace->close();
?>
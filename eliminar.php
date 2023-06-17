<?php
include 'conexion.php';
$id = $_GET['id_estilista'];
$eliminar = "DELETE FROM estilista WHERE id_estilista = '$id'";
#pregunta si quiere eliminar el registro 
#continuar (si) cancelar (devuelvelo a la pagina busqueda) 
$elimina = $enlace->query($eliminar);
header("Location:Busqueda.php");
$enlace->close();
?>
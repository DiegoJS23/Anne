<?php
include 'conexion.php';
require_once './enviocorreocc.php';
$id = $_GET['id_cita'];

        $extraerdatocita = "SELECT c.id_cliente, c.id_estilista, c.hora FROM cita c WHERE c.id_cita = '$id' ";
        $extraerdatocita1 = $enlace->query($extraerdatocita);

            while($row=mysqli_fetch_array($extraerdatocita1)){   
                $id_cliente = $row['id_cliente'];
                $id_estilista = $row['id_estilista'];
                $hora = $row['hora'];
                }

        $extraerdatoest = "SELECT e.email_e, e.id_estilista FROM cita c INNER JOIN estilista e 
                        ON c.id_estilista = e.id_estilista WHERE e.id_estilista = '$id_estilista'";
        $extraerdatoest1 = $enlace->query($extraerdatoest);

            while($row=mysqli_fetch_array($extraerdatoest1)){    
            $email_e = $row['email_e'];
            }

        $extraerdatocli = "SELECT ci.email_c FROM cita c INNER JOIN cliente ci 
                        ON c.id_cliente = ci.id_cliente WHERE ci.id_cliente = '$id_cliente'";
        $extraerdatocli1 = $enlace->query($extraerdatocli);
            
            while($row=mysqli_fetch_array($extraerdatocli1)){    
            $email_c = $row['email_c'];
            }

$eliminar = "DELETE FROM cita WHERE id_cita = '$id'";
$elimina = $enlace->query($eliminar);


        enviar_cancel_cli($id_estilista, $email_c, $hora);

        enviar_cancel_est($email_e, $id_cliente, $hora);


//header("Location:CancelarCitas.php"); esta linea la suple la linea 96 y 103 de enviocorreocc.php
$enlace->close();

?>
<?php
    include 'conexion.php';

    //$var = "El usuario se encuentra registrado";
    $var = "Error en la linea SQL";
    $var3 = "El cliente ya está registrado";
    $var4 = "El horario del cliente está ocupado";
    //$var5 = "Su registro fue exitoso";

    if (isset($_POST['enviar'])) {
        $id_cliente = $_POST['documento'];
        $id_estilista = $_POST['estilista'];
        $hora = $_POST['hora'];

        $validar = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'";
        $validando = $enlace->query($validar);
        $validar2 = "SELECT * FROM horario_cita WHERE id_estilista = '$id_estilista' && hora ='$hora'";
        $validando2 = $enlace->query($validar2);
        //verificar si el usuario existe en la tabla cliente
        //y si el id_estilista y la hora eisten para REGISTRAR en cita.

        if ($validando->num_rows > 0  && $validando2->num_rows > 0) {
            //validaciones para poder registrar 
            $validar3 = "SELECT * FROM cita WHERE id_cliente = '$id_cliente' ";
            $validando3 = $enlace->query($validar3);
            
            //validacion si ya hay un cliente del estilista escogido
            if ($validando3->num_rows > 0) {
                echo "<script> alert('".$var3."'); </script>";
            }
            else{
                $validar4 = "SELECT * FROM cita WHERE id_estilista = '$id_estilista' && hora ='$hora' ";
                $validando4 = $enlace->query($validar3);
                    if ($validando4->num_rows > 0) {
                    echo "<script> alert('".$var4."'); </script>";
                    }
                    else{
                        //hacer el query para registrar(insertar registro)
                        $insertarDatos = "INSERT INTO cita(id_cita,id_cliente,id_estilista,hora) 
                                                    VALUES('NULL',
                                                        '$id_cliente',
                                                        '$id_estilista',
                                                        '$hora')";
            
                        $ejecutarInsertar = $enlace->query($insertarDatos);
                        
                        if (!$ejecutarInsertar) {
                            echo "<script> alert('".$var."'); </script>";
                        }
                        else {
                            
                            require_once './enviocorreoac.php';

                            $extraerdatoest = "SELECT e.email_e FROM cita c INNER JOIN estilista e 
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
                            
                            enviar_mail_cli($id_estilista, $email_c, $hora);
                            
                            enviar_mail_est($email_e, $id_cliente, $hora);

                        }
                    }
            }
        }
        else {
            echo "
            <script> 
                alert('El usuario ".$id_cliente." o el horario de estilista".$id_estilista." no se encuentra registrado');
                window.location = 'ApartarCitas.php';
            </script>
            ";
        }

    }

    if (isset($_POST['regreso'])){
        header("Location:InicioCliente.html");
    }

?>

<html>
    <head>
        <meta charset="utf-8"> 
        <title>ANNE</title>
        <meta name="Description" content="App encargada de gestionar citas en un salón de belleza"> 
        <meta name="Keywords" content="Salón de belleza, estilistas, citas">
        <link rel="icon" type="image/jpg" href="logo.jpg" >
        <style type="text/css">

*{background-color: white;}
            *{font-family: serif;}
            form{text-align: left;}
            input{color: rosybrown;}
            h1{font-size: 30px;}
            h1{text-align: center;}
            h1{color: rosybrown;}
            form{color: rosybrown;}
            a{text-align: left;}
            
            .Formulario{
                    width: 400px;
                    height: 495px;
                    border: 15px solid rosybrown;
                    margin: 10px auto;
                    padding: 15px;
                    background: white;
                    border-radius: 30px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
            }

            form{
                padding: 20px;
                max-width: 400px;
                margin: 0 auto;
            }

            form input{
                margin-bottom: 5px;
                font-family: serif;
                width: 100%;
                padding: 3px;
               -webkit-box-sizing: border-box;
                box-sizing: border-box;
                color: rosybrown;
                font-size: 1em;
                border-bottom: 2px solid rosybrown;
                border-top: none;
                border-left: none;
                border-right: none;
            }

            ::placeholder{
                color: rosybrown;
            }

            form select{
                margin-bottom: 6px;
                font-family: serif;
                width: 100%;
                padding: 3px;
               -webkit-box-sizing: border-box;
                box-sizing: border-box;
                color: rosybrown;
                font-size: 1em;
                border-bottom: 2px solid rosybrown;
                border-top: none;
                border-left: none;
                border-right: none;
            }

            div{
                display: flex;
                justify-content: center;
            }

            .boton_personalizado{
                    text-decoration: none;
                    padding: 6px;
                    font-weight: 400;
                    font-size: 18px;
                    color: white;
                    background-color:rosybrown;
                    border-radius: 6px;
                    border: 2px solid ivory;
                 }
            
            .boton_personalizado{
                display: inline;
                width: 50%;
            }

            .boton_personalizado:hover{
                background-color: lightsteelblue;
            }

            #logo{
                border-radius: 6px;
            }

            .menu{
                    width: 100%;
                    background: rosybrown;
                    list-style: none;
                    padding: 0;
                    margin: 2px;
                    border-radius: 6px;

                }

               .menu li{
                    display: inline-block;
                }

               .menu li a {
                    padding: 10px 20px;
                    display: inline-block;
                    color: rosybrown;
                    background-color: ivory;
                    text-decoration: none;
                    font-size: 20px;
                }

                .menu li a:hover{
                    background: lightsteelblue;
                }

        </style>
    </head>

    <body>

        <header>
            <div class="menu"> 
                <h1>ANNE</h1>
            </div>
        </header>
        <br>

        <section id="Registro"  class="Formulario">
            <form action="" method="POST">
               <h2> Agendar citas</h2>
               <input type="text" name="documento" placeholder="Número de documento" required>
            <p>
                <select name="estilista" required="">
                <?php
                $getEstilista1 = "SELECT * FROM estilista ORDER BY id_estilista";//$where 
                $getEstilista2 = mysqli_query($enlace, $getEstilista1);

                while($row=mysqli_fetch_array($getEstilista2)){    
                    $nombre = $row['nombre_e'];
                    $apellido = $row['apellido_e'];
                    $tipoiden = $row['tipo_d_e'];
                    $id_estilista = $row['id_estilista'];
                    $cel = $row['cel_e'];
                    $email = $row['email_e'];
                    ?>
                    <option value="<?php echo $id_estilista; ?>"><?php echo $nombre; ?></option>
                    <?php
                }
                ?>
                </select>
            </p>
            <p>
                <select name="hora" required>
                <?php
                $getHora1 = "SELECT * FROM horario_cita ORDER BY hora";//$where 
                $getHora2 = mysqli_query($enlace, $getHora1);

                while($row=mysqli_fetch_array($getHora2)){    
                    $id_estilista = $row['id_estilista'];
                    $hora = $row['hora'];
                    ?>
                    <option value="<?php echo $hora; ?>"><?php echo $hora; ?></option>
                    <?php
                }
                ?>
                </select>
            </p>
            <br><br> 
            <div>
                <input type ="submit" value = "OK "name="enviar" class="boton_personalizado">
                <!--Verificar si: el cliente está disponible y hay horarios disponibles.
                para poder asignarle al cliente su cita-->
            </div>
            </form>
        </section>

        <form action="#" method="POST">
            <div>
                <input type ="submit" name="regreso" value ="Regresar" class="boton_personalizado">
            </div>
        </form>
    </body>
</html>
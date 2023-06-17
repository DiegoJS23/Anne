<?php
    include 'conexion.php';

    $var = "Error en la linea de sql";
    $var2 = "Horario Estilista ocupado";
    $var3 = "Registro exitoso";

    if (isset($_POST['enviar'])) {
        
        $id_estilista = $_POST['estilista'];
        $hora = $_POST['hora'];
        
        
        $validar = "SELECT * FROM horario_cita WHERE id_estilista = '$id_estilista' && hora ='$hora'";
        $validando = $enlace->query($validar);
        //validacion si ya hay un horario del estilista escogido
         if ($validando->num_rows > 0) {
            echo "<script> alert('".$var2."'); </script>";
        }
        else {
            $insertarDatos = "INSERT INTO horario_cita(id_estilista, hora) 
                                                    VALUES('$id_estilista',
                                                        '$hora')";

            
            $ejecutarInsertar = $enlace->query($insertarDatos);
            
            if (!$ejecutarInsertar) {
                echo "<script> alert('".$var."'); </script>";
            }
            else {
                echo "
                <script> 
                    alert('".$var3."');
                    window.location = 'horario.php';
                </script>
                ";
                
            }
        }
    }
    if (isset($_POST['regreso'])){
        header("Location:InicioAdmin.html");
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
                    text-align: center;
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
            <form action="#" method="POST">
               <h2> Registrar Horario de Estilista</h2>
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
                <select name="hora" required="">
                    <?php
                    $r=0;
                    $a="";
                    
                        while($r<=13 ){
                            $valor = 7 + $r;
                            $a = "$valor AM"; 
                            $r = $r + 1 ;
                            if($valor == 12){
                                $a= "$valor PM";
                            }
                            elseif($valor > 12){
                                    $valor = $valor - 12 ;
                                    $a= "$valor PM";
                                }
                            else {
                                $a;
                            }
                    ?>
                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </p> 

            <div>
                <input type ="submit" name="enviar"  class="boton_personalizado">

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

<?php
    include 'conexion.php';
    
    $var = "Error en la linea de sql";
    $var2 = "El usuario que intenta registrar ya existe";
    $var3 = "Su registro fue exitoso";

    if (isset($_POST['enviar'])) {
        //echo '<a href="C:\xampp\htdocs\ISOFT\Confirmación.html"></a>';
        $nombre_e = $_POST['Nombre'];
        $apellido_e = $_POST['Apellidos'];
        $tipo_d_e = $_POST['Tipodocumento'];
        $id_estilista = $_POST['documento'];
        $cel_e = $_POST['Celular'];
        $email_e = $_POST['Email'];
        
        $validar = "SELECT * FROM estilista WHERE id_estilista = '$id_estilista'";
        $validando = $enlace->query($validar);
        if ($validando->num_rows > 0) {
            echo "<script> alert('".$var2."'); </script>";
        }
        else {
            $insertarDatos = "INSERT INTO estilista(nombre_e, apellido_e,tipo_d_e,id_estilista,cel_e,email_e) 
                                                    VALUES('$nombre_e',
                                                        '$apellido_e',
                                                        '$tipo_d_e',
                                                        '$id_estilista',
                                                        '$cel_e',
                                                        '$email_e')";

            
            $ejecutarInsertar = $enlace->query($insertarDatos);
            
            if (!$ejecutarInsertar) {
                echo "<script> alert('".$var."'); </script>";
            }
            else {
                echo "
                <script> 
                    alert('".$var3."');
                    window.location = 'RegistroEstilista.php';
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
               <h2> Registrar Estilista</h2>
                <input type="text" name="Nombre" placeholder="Nombre" required=""> <br> <br> 
                <input type="text" name="Apellidos" placeholder="Apellidos" required=""> <br> <br> 
            <p>
                <select name="Tipodocumento" required="">
                    <option value="Tipo">Tipo de documento</option>
                    <option value="Cédula">Cédula de ciudadanía</option>
                    <option value="Tarjeta">Tarjeta de identidad</option>
                    <option value="Cédula">Cédula extranjera</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Otra">Otra</option>
                </select>
            </p>
            <br> 
            <input type="text" name="documento" placeholder="Número de documento" required=""> <br> <br>
            <input type="text" name="Celular" placeholder="Celular o teléfono" required=""> <br> <br>
            <input type="email" name="Email" placeholder="Email" required=""> <br> <br>

            <div>
                <input type ="submit" name="enviar"  class="boton_personalizado">
            <!--Debes registrar en la base de datos este formulario
            para adelante poner un script que esta registrado correctamente
            y redirigir al usuario a la pagina Confirmacion-->
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

<?php
    include 'conexion.php';

    $id = $_GET['id_cliente'];
    $modificar = "SELECT * FROM cliente WHERE id_cliente = '$id'";
    $modifica = $enlace->query($modificar);

    $dato = $modifica->fetch_array();

    if (isset($_POST['modificar'])) {
//recuperar los datos que se encuentran en cada uno de los inputs
        $id = $_POST['id'];
        $nombre = $enlace->real_escape_string($_POST['mNombre']);
        $apellido = $enlace->real_escape_string($_POST['mApellidos']);
        $celular = $enlace->real_escape_string($_POST['mCelular']);
        $email = $enlace->real_escape_string($_POST['mEmail']);

//realizar la consulta para modificar los datos
        $actualiza = "UPDATE cliente SET nombre_c = '$nombre', apellido_c ='$apellido', cel_c = '$celular', email_c = '$email' WHERE id_cliente = '$id'";
        $actualizar = $enlace->query($actualiza);
        header("Location:BusquedaCli.php");
    }
    if (isset($_POST['regreso'])){
        header("Location:BusquedaCli.php");
    }
?>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>ANNE</title>
        <meta name="Description" content="App encargada de gestionar citas en un salón de belleza"> 
        <meta name="Keywords" content="Salón de belleza, estilistas, citas">
        <link rel="icon" type="image/jpg" href="logo.jpg">
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
               <h2> Modificar Cliente</h2>
               <input type="hidden" name="id" value="<?php echo $dato['id_cliente']; ?>" >
                <input type="text" name="mNombre" value="<?php echo $dato['nombre_c']; ?>" placeholder="Nombre" required> <br> <br> 
                <input type="text" name="mApellidos" value="<?php echo $dato['apellido_c']; ?>" placeholder="Apellidos" required> <br> <br> 
            <!--<p>
                <select name="mTipodocumento" value="<?php echo $dato['tipo_d_c']; ?>" required>
                    <option value="Tipo">Tipo de documento</option>
                    <option value="Cédula">Cédula de ciudadanía</option>
                    <option value="Tarjeta">Tarjeta de identidad</option>
                    <option value="Cédula">Cédula extranjera</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Otra">Otra</option>
                </select>
            </p>
            Estoy pensando seriamente dejar este campo de arriba para editar Yiyo
            <br> -->
             
            <input type="text" name="mCelular" value="<?php echo $dato['cel_c']; ?>" placeholder="Celular o teléfono" required> <br> <br>
            <!--Mandar correo diciendo que se actualizó el correo-->
            <input type="text" name="mEmail" value="<?php echo $dato['email_c']; ?>" placeholder="Email" required> <br> <br>

            <div>
                <input type ="submit" name="modificar" value="Actualizar" class="boton_personalizado">
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
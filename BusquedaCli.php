<?php
    error_reporting(0);
    include 'conexion.php';

        $where = "";
        if (!empty($_POST)) {
            $valor = $_POST['busquecliente'];

            if (!empty($valor)) {
                $where = "WHERE id_cliente LIKE '%$valor%'";
            }
        }
        $consulta = "SELECT * FROM cliente $where";//$where 
        $resultado = $enlace->query($consulta);
        
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
                        h1{font-size: 20px;}
                        h1{text-align: center;}
                        h1{color: rosybrown;}
                        form{color: rosybrown;}
                        a{text-align: left;}
                        p{font-size: 20;}
                        p{color: rosybrown;}
                        
                        .Formulario{
                                width: 200px;
                                height: 100px;
                                border: 5px solid rosybrown;
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
                                padding: 3px;
                                font-weight: 20;
                                font-size: 18px;
                                color: white;
                                background-color:rosybrown;
                                border-radius: 6px;
                                border: 2px solid ivory;
                             }
                        
                        .boton_personalizado{
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            width: 20%;
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

<!--action='<php echo $_SERVER['PHP_SELF']; >-->
        <form action="" method="post" target="">

            <p>
          
             <input type="search" name="busquecliente" placeholder="Id Cliente">
          
             <input type ="submit" value = "Buscar" name="apartarcitas" class="boton_personalizado">
                <!--Pregutnarle a Angie Daniela para qué sirve esto si ya con el de apartar citas uno se da cuenta de la disponibilidad del estilista -->
            </p>
                            
        </form>
            
        <br><div>
            <?php if ($resultado->num_rows > 0) { ?>
             <table>
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Documento</th>
                    <th>Numero de Documento</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                <?php while($row = $resultado->fetch_assoc()) { ?>      
                    <tr>
                        <td><?php echo $row['nombre_c']?></td>
                        <td><?php echo $row['apellido_c']?></td>
                        <td><?php echo $row['tipo_d_c']?></td>
                        <td><?php echo $row['id_cliente']?></td>
                        <td><?php echo $row['cel_c']?></td>
                        <td><?php echo $row['email_c']?></td>
                        <td><a href="modificarcli.php?id_cliente=<?php echo $row['id_cliente']; ?>">Editar</a>-<a href="eliminarcli.php?id_cliente=<?php echo $row['id_cliente']?>">Borrar</a></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
            <?php } else { ?>
                <div>
                    <p>No se encontraron datos en la consulta</p>
                </div>
            <?php } ?>
        </div>
        <form action="#" method="POST">
                <div>
                    <input type ="submit" name="regreso" value ="Regresar" class="boton_personalizado">
                </div>
            </form>
    </body>
</html>
<?php
    error_reporting(0);
    include 'conexion.php';

    //$var = "No se encontraron datos en la consulta";
    //$var2 = "Todo va funcionando";
        $where = "";
        if (!empty($_POST)) {
            $valor = $_POST['busquecliente'];

            if (!empty($valor)) {
                $where = "WHERE id_cliente LIKE '%$valor%'";
            }
        }
        $consulta = "SELECT * FROM cita $where";//$where 
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

        
            <form action="" method="POST">
               <h2> Cancelar citas </h2>
               <form action="" method="post" target="">

                <p>

                <input type="search" name="busquecliente" placeholder="Id cliente">

                <input type ="submit" value = "Buscar" name="cancelarcita" class="boton_personalizado">
                    <!--Pregutnarle a Angie Daniela para qué sirve esto si ya con el de apartar citas uno se da cuenta de la disponibilidad del estilista -->
                </p>
                                
                </form>

                <br><div>
                <?php if ($resultado->num_rows > 0) { ?>
                <table>
                    <thead>
                        <th>ID Cita</th>
                        <th>ID Cliente</th>
                        <th>ID Estilista</th>
                        <th>HORA CITA</th>
                        <th>Calcelar</th>
                    </thead>
                    <tbody>
                    <?php while($row = $resultado->fetch_assoc()) { ?>      
                        <tr>
                            <td><?php echo $row['id_cita']?></td>
                            <td><?php echo $row['id_cliente']?></td>
                            <td><?php echo $row['id_estilista']?></td>
                            <td><?php echo $row['hora']?></td>
                            <!--poner el boton de abajo mas bonito jiji-->
                            <td><a href="cancelar.php?id_cita=<?php echo $row['id_cita']; ?>" class="boton_personalizado">Cancelar</a></td>
                        </tr>
                        <br><br>
                    <?php } ?> 
                    </tbody>
                </table>
                <?php } else { ?>
                    <div>
                        <p>No se encontraron registros.</p>
                    </div>
                <?php } ?>
                </div>
                <!--Al dar Ok el sistema debe enviar un correo al estilista con la información 
                de la cancelación de la cita y eliminar el registro de dicha cita--> 
            

        <form action="#" method="POST">
                <div>
                    <input type ="submit" name="regreso" value ="Regresar" class="boton_personalizado">
                </div>
        </form>
    </body>
</html>
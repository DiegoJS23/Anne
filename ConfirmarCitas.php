<?php
    include 'conexion.php';


    
   

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
               <p>
               <input type="text" name="documento" placeholder="Número de documento" required> <br> <br>
            </p>
            <p>
                <select name="Estilistas" name="" required>
                    <option value="Estilistas">Nombres estilistas</option>
                </select>
            </p>

            <p>
                <select name="Horarios" name="" required>
                    <option value="Horarios">Horarios disponibles</option>
                </select>
            </p>

            <div>
                <input type ="submit" value = "OK" name="enviar" href="" class="boton_personalizado"> 
                <!--Al dar Ok el sistema debe enviar un correo al estilista 
                y al cliente con la información de la cita y del cliente --> 
            </div>
            </form>
        </section>

        <footer>
            <a href=""></a>
        </footer>
    </body>
</html>
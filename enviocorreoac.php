<?php
    //ARCHIVO CON LAS FUNCIONES PARA ENVIAR CORREOS 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";
    require "phpmailer/src/Exception.php";

function enviar_mail_cli ($n_estilista, $e_cliente, $hora){//Envio correo a $cliente

        //$para = 'diego.js2399@gmail.com';
        $de = 'diegocheck23@gmail.com';
        $clave = '1143414diego';
        $registro = 'anonimo.239923@gmail.com';
    
    $mail = new PHPMailer(true);

    try{
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;//autenticacino de smtp
        $mail->Username = $de;
        $mail->Password = $clave;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($de, 'PROYECTO ANNE');
        $mail->addAddress($e_cliente);
        $mail->addCC($registro); //agregar réplica

        $mail->addAttachment('logo.jpg');

        $mail->isHTML(true);
        $mail->Subject = 'Cita Confirmada';
        $mail->Body = 'Saludos de Anne Peluqueria </br>Ud tiene una cita con el estilista <b>'.$n_estilista.'</b>
                        a la hora: <b>'.$hora.'</b>. Recuerde llegar 15 min antes para confirmar su cita.</br></br>
                        <div><img src="logo.jpg" alt=""></div>';
        $mail->send();

        echo "
        <script> 
            alert('Su registro fue exitoso y el correo fue enviado a ".$e_cliente." satisfactoriamente');
        </script>
        ";
    } catch(Exception $e){
        echo "
        <script> 
        alert('No se pudo enviar el correo y su registro no fue exitoso');
        </script>
        ";
        //'Mensaje'.$mail->ErrorInfo;
    }
}

function enviar_mail_est($e_estilista, $n_cliente, $hora){//Envio correo a $estilista

    //$para = 'diego.js2399@gmail.com';
    $de = 'diegocheck23@gmail.com';
    $clave = '1143414diego';
    $registro = 'anonimo.239923@gmail.com';

$mail = new PHPMailer(true);

try{
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;//autenticacino de smtp
    $mail->Username = $de;
    $mail->Password = $clave;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($de, 'PROYECTO ANNE');
    $mail->addAddress($e_estilista);
    $mail->addCC($registro); //agregar réplica

    $mail->addAttachment('logo.jpg');

    $mail->isHTML(true);
    $mail->Subject = 'Cita Confirmada';
    $mail->Body = 'Saludos de Anne Peluqueria </br>Ud tiene una cita con el cliente <b>'.$n_cliente.'</b>
                    a la hora: <b>'.$hora.'</b>. Gracias por la atenci&oacute;n prestada.</br></br>
                    <div><img src="logo.jpg" alt=""></div>';
    $mail->send();

    echo "
    <script> 
        alert('Su registro fue exitoso y el correo fue enviado a ".$e_estilista." satisfactoriamente');
        window.location = 'ApartarCitas.php';
    </script>
    ";
} catch(Exception $e){
    echo "
    <script> 
    alert('No se pudo enviar el correo y su registro no fue exitoso');
    window.location = 'ApartarCitas.php';
    </script>
    ";
    //'Mensaje'.$mail->ErrorInfo;
    }
}

?>
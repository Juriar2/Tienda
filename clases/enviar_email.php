<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';





//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  SMTP::DEBUG_OFF;       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'yuriar2000@hotmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Tiendakika@teapatabasco.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 443;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('Tiendakika@teapatabasco.com', 'Tienda Kika Teapa Tabasco');
    $mail->addAddress('yuriar2000@hotmail.com', 'Joe User');     //Add a recipient
    


    //Content
    $mail->isHTML(true);                              
    $mail->Subject = 'Detalles de compra en la tienda Kika Teapa Tabasco';

    $cuerpo = '<h1>Muchas Gracias por aver comprado en un momento le hacemos llegar su guia</h1>';
    $cuerpo .= '<p>El ID de su compra es: <b>' . $idTransaccion . '</b></p>';

    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra.';

    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
} catch (Exception $e) {
    echo "Erro al emviar el correo electronico verifique este correcto: {$mail->ErrorInfo}";
    
}

?>
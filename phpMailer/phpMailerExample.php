<?php

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$solicitante = $_POST['solicitante'];
$agraciados = $_POST['agraciados'];
$dataDoFato = $_POST['dataDoFato'];
$emailSolicitante = $_POST['emailSolicitante'];
$sintese = $_POST['sintese'];


$assunto = 'Subject';
  //Corpo E-mail - Body email
$mensagem = "
    <html>
      <p><b>Solicitante: </b>$solicitante</p>
      <p><b>Agraciados: </b>$agraciados</p>
      <p><b>Data do Fato: </b>$dataDoFato</p>
      <p><b>Síntese: </b>$sintese</p>
    </html>
";


define("EMAIL_ORIGEM","emailorigem@example.com"); //your email
define("SENHA_EMAIL","ywzhjfkksfd");//senha tradicional password 
//define("SENHA_EMAIL","kjdkjdasjldjl");//senha de app /app password

define("EMAIL_DESTINO","emaildestino@example.com");
define("EMAIL_COPIA","emailcopy@example.com");


function send($assunto, $mensagem){

    try {
        $mail = new PHPMailer(true);

        $mail->setLanguage('br');
        $mail->isSMTP();
        $mail->SMTPAuth = true;
      //  $mail->AuthType = 'CRAM-MD5';
      //  $mail->SMTPDebug = 0; // 1 para debug //0 para normal
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = EMAIL_ORIGEM;
        $mail->Password = SENHA_EMAIL;
        $mail->Port = 465;
        $mail->setFrom(EMAIL_ORIGEM);
        $mail->addAddress(EMAIL_DESTINO);
        $mail->addCC(EMAIL_COPIA);
        $mail->addReplyTo(EMAIL_DESTINO);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        //echo "Error: {$mail->ErrorInfo}";
        
    }
}

//Enviar
if(send($assunto, $mensagem))
{
    echo "Enviado";
}
else{
    echo "erro";
    
    
}

?>
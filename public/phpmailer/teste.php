<?php
error_reporting( E_ALL ); 
ini_set('max_execution_time', 30);

echo "email.. <br>"; 

//Require da lib
require_once('class/class.phpmailer.php');


        
//envia o email para o admin, notificando novo cadastro
$assunto = "Novo Cadastro inserido na plataforma Iroof";
$EMAILDEST = 'contato@iroof.com.br';
$mensagemEmailHtml = 
"<h1>Sistema <b>iRoof</b></h1>
<h3> Solicitação de Cadastro <b>inserida</b> no sistema </h3>
Um novo cadastro de do tipo <b>Prestador</b>, foi inserido no sistema.<br>
É necessário realizar aguardar a ativação da conta pelo solicitante.<br><br>
Email: teste@teste.com <br>
Celular: 11999999999<br>
<br>
Sistema <b>iRoof</b>";




$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = "SSL"; // secure transfer enabled REQUIRED for Gmail
$mail->Host =  "smtp.hostinger.com";
$mail->Port = "465"; // or 587
$mail->IsHTML(true);
$mail->Username = "suporte@p2win.com.br";
$mail->Password = "M@rcello3159";
$mail->SetFrom("suporte@p2win.com.br", "Contato P2WIN");
$mail->Subject = "Contato P2WIN";
$mail->Body = $mensagemEmailHtml;

$mail->AddAddress($EMAILDEST);

   if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      echo "Mensagem enviada com sucesso";
   }
?>



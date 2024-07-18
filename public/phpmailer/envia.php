<?php

$mensagemEmailHtml="
<p>Novo contato do formulário do site - P2Win</o>
EMAIL: <br>
ASSUNTO: <br>
DESCRICAO: <br>
TELEFONE: <br>
INFO ADICIONAL: <br>
MOTIVO DO CONTATO: <br>
";

//Require da lib
require_once('class/class.phpmailer.php');


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

$mail->AddAddress('altasistecnologia@gmail.com','Contato P2WIN');

if(!$mail->Send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
    "<script>console.log('ERRO ENVIANDO EMAIL: " .$mail->ErrorInfo. "'); </script>'";
} else {
    echo "Mensagem enviada com sucesso";
}

?>



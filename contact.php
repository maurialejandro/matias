<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Si usas composer
// Si no usas composer, cambia esto por:
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mauri.alejandro2165@gmail.com'; // 👉 Tu correo Gmail
    $mail->Password   = 'tu_contraseña_de_aplicacion'; // 👉 Contraseña de aplicación (no tu contraseña normal)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuración del correo
    $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre');
    $mail->addAddress('destino@gmail.com', 'Destinatario'); // 👉 El destinatario
    $mail->addReplyTo('tu_correo@gmail.com', 'Responder a');

    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    $mail->Body    = 'Este es un correo enviado por <b>PHPMailer</b> con SMTP y Gmail.';
    $mail->AltBody = 'Este es un correo enviado por PHPMailer con SMTP y Gmail.';

    $mail->send();
    echo '¡El correo fue enviado con éxito!';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>

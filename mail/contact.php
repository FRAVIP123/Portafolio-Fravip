<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'frankyomar7113@gmail.com'; // Reemplaza con tu correo
        $mail->Password = '@FRANKy7113'; // Reemplaza con tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom($email, $name);
        $mail->addAddress('frankyomar7113@gmail.com'); // Correo de destino
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Nombre: $name<br>Email: $email<br><br>Mensaje:<br>$message";

        $mail->send();
        echo "Mensaje enviado con éxito.";
    } catch (Exception $e) {
        http_response_code(500);
        echo "Error al enviar el mensaje. Detalle: {$mail->ErrorInfo}";
    }
} else {
    http_response_code(403);
    echo "Método no permitido.";
}
?>

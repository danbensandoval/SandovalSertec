<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "danbensanloz@gmail.com"; // Cambia esto por tu correo
    $subject = "Nuevo mensaje del formulario de contacto";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        echo "Por favor completa todos los campos correctamente.";
        exit;
    }

    $email_content = "Nombre: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        echo "OK";
    } else {
        echo "Hubo un problema al enviar el mensaje. Intenta nuevamente.";
    }
} else {
    echo "Método no permitido.";
}
?>

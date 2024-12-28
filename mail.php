<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Настройки сервера
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP сервер Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'valeralyuzovitch@gmail.com'; // Ваш email
        $mail->Password = 'xzmq jbgk vuxe jsuy'; // Пароль приложения
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Используйте TLS
        $mail->Port = 587; // Порт для TLS

        // Отправитель и получатель
        $mail->setFrom('valeralyuzovitch@gmail.com', 'Feedback Form');
        $mail->addAddress('valeralyuzovitch@gmail.com'); // Email получателя

        // Содержимое письма
        $mail->isHTML(true);
        $mail->Subject = 'Сообщение с формы обратной связи';
        $mail->Body = "
        <html>
        <head>
            <title>Сообщение с формы обратной связи</title>
        </head>
        <body>
            <p><strong>Имя:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Телефон:</strong> $phone</p>
            <p><strong>Сообщение:</strong> $message</p>
        </body>
        </html>
        ";

        $mail->send();
        echo 'Сообщение успешно отправлено!';
    } catch (Exception $e) {
        echo "Ошибка при отправке сообщения: {$mail->ErrorInfo}";
    }
}
?>
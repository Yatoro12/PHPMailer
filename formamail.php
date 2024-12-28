<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
</head>
<body>
    <h2>Форма обратной связи</h2>
    <form action="mail.php" method="post">
        <label for="name">Ваше имя:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Номер телефона:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="message">Сообщение:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Отправить сообщение">
    </form>
</body>
</html>
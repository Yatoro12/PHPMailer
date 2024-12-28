<?php
session_start(); // Запускаем сессию для хранения результатов

// Проверяем, была ли нажата кнопка "Сбросить"
if (isset($_POST['reset'])) {
    $_SESSION['results'] = []; // Очищаем все результаты
    header("Location: " . $_SERVER['PHP_SELF']); // Перенаправляем на ту же страницу
    exit(); // Завершаем выполнение скрипта
}

// Проверяем, была ли нажата кнопка "Отправить"
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $preferences = isset($_POST['preferences']) ? $_POST['preferences'] : [];

    // Проверка заполнения полей имени и фамилии
    if (empty($name) || empty($surname)) {
        $error = "Пожалуйста, заполните все поля.";
    } else {
        // Формируем результат
        $preferencesText = 'отсутствуют';
        if (count($preferences) == 1) {
            $preferencesText = implode(", ", $preferences);
        } elseif (count($preferences) > 1) {
            $preferencesText = 'овощи и фрукты';
        }

        // Добавляем результат в сессию
        $_SESSION['results'][] = [
            'name' => $name,
            'surname' => $surname,
            'preferences' => $preferencesText
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
    <form method="post" action="">
        <label for="name">Введите имя:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="surname">Введите фамилию:</label>
        <input type="text" id="surname" name="surname" required><br><br>

        <label>Предпочитаете:</label><br>
        <input type="checkbox" id="vegetables" name="preferences[]" value="овощи">
        <label for="vegetables">Овощи</label><br>
        <input type="checkbox" id="fruits" name="preferences[]" value="фрукты">
        <label for="fruits">Фрукты</label><br><br>

        <input type="submit" name="submit" value="Отправить">
        <input type="submit" name="reset" value="Сбросить">
    </form>

    <?php
    // Вывод всех результатов
    if (!empty($_SESSION['results'])) {
        foreach ($_SESSION['results'] as $result) {
            echo "<div class='result'>";
            echo "<h3>Результат:</h3>";
            echo "<p>Имя: {$result['name']}</p>";
            echo "<p>Фамилия: {$result['surname']}</p>";
            echo "<p>Предпочтения: {$result['preferences']}</p>";
            echo "</div>";
        }
    }

    ?>
</body>
</html>
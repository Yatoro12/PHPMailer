<?php
// Ваш API ключ от RapidAPI
$apiKey = '5a202d4ce9msh0ebef4c3ea7edeep1e96a4jsn7e243d51745f'; // Замените на ваш реальный ключ

// URL API для получения топ-250 фильмов
$apiUrl = 'https://imdb236.p.rapidapi.com/imdb/top250-movies';

// Инициализация cURL
$curl = curl_init();

// Настройка параметров cURL
curl_setopt_array($curl, [
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true, // Возвращать результат вместо вывода
    CURLOPT_HTTPHEADER => [
        'X-RapidAPI-Host: imdb236.p.rapidapi.com',
        'X-RapidAPI-Key: ' . $apiKey // Передаем API ключ в заголовке
    ],
]);

// Выполнение запроса
$response = curl_exec($curl);

// Проверка на ошибки
if ($response === FALSE) {
    die('Ошибка при выполнении запроса: ' . curl_error($curl));
}

// Закрытие cURL
curl_close($curl);

// Декодируем JSON-ответ
$movies = json_decode($response, true);

// Проверяем, есть ли данные
if (empty($movies)) {
    echo "<p>Фильмы не найдены.</p>";
} else {
    echo '<div class="container mt-5">';
    echo '<h1 class="text-center">Топ-250 фильмов IMDb</h1>';
    echo '<div class="row mt-4">';

    // Перебор фильмов и вывод информации
    foreach ($movies as $movie) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="' . $movie['primaryImage'] . '" class="card-img-top" alt="' . $movie['title'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $movie['title'] . '</h5>';
        echo '<p class="card-text">Рейтинг: ' . $movie['averageRating'] . '</p>';
        echo '<p class="card-text"><small class="text-muted">Год: ' . $movie['startYear'] . '</small></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Топ-250 фильмов IMDb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
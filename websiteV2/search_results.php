<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Результаты теста</title>
    <style>
        body {
            background-color: #1a1a2e;
            color: white;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        /*верхняя панель*/
        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(54, 55, 80, 0.68);
        }
        #header h1 {
            margin: 0;
            font-size: 36px;
            text-transform: capitalize;
        }
        #header a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #4c4c7f;
        }
        #header a:hover {
            background-color: #6d6da3;
        }
        #content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
        }
        #content h2 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        #content p {
            margin: 0;
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="header">
    <h1>Результаты теста</h1>
    <div>
        <a href="/PD/websiteV2/lk_tut.php">личный кабинет</a>
        <a href="/PD/websiteV2/create_test.html">создать тест</a>
        <a href="/PD/websiteV2/resTest_tut.html">результаты</a>
        <a href="/PD/website/choise.html">выход</a>
    </div>
</div>
<?php
// Подключение к базе данных
$host = 'localhost';
$username = 'root';
$password = 'mysql';
$dbname = 'student-bd';
$conn = mysqli_connect($host, $username, $password, $dbname);

// Проверка соединения
if (mysqli_connect_errno()) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Получение значения поля поиска из GET-запроса
if (isset($_GET['title'])) {
    $title = $_GET['title'];

    // Выполнение запроса к базе данных
    $query = "SELECT * FROM test WHERE title LIKE '%$title%'";
    $result = mysqli_query($conn, $query);

    // Вывод результатов поиска
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Результаты поиска:</h2>";
        echo "<table>";
        echo "<tr><th>Название теста:</th><th>Результат:</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['title'] . "</td><td>" . $row['result'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Результаты не найдены.";
    }
}

// Закрытие соединения с базой данных
mysqli_close($conn);
?>
</body>
</body>
</html>

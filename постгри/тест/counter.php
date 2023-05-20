<?php

// Установка параметров подключения к базе данных
$dbhost = 'localhost';
$dbname = 'testingsystem';
$dbuser = 'postgres';
$dbpass = 'mysql';

// Подключение к базе данных
$db = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Получение значения параметра test_name из GET-запроса или установка пустого значения
$testName = isset($_GET['testName']) ? $_GET['testName'] : '';

// Получение значения параметра username из сессии или установка пустого значения
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Инициализация счетчиков
$correctAnswersCount = 0;
$totalRowsCount = 0;

// Получение и сравнение полей right_answer и answer из таблицы results
$query = $db->prepare("SELECT right_answer, answer FROM results WHERE test_name = :testName AND username = :username");
$query->bindParam(':testName', $testName);
$query->bindParam(':username', $username);
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $totalRowsCount++;

    if ($row['right_answer'] === $row['answer']) {
        $correctAnswersCount++;
    }
}

// Вывод результатов
echo "Количество правильных ответов: $correctAnswersCount<br>";
echo "Общее количество строк: $totalRowsCount";

?>

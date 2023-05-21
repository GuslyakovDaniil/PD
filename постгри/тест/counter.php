<?php
session_start(); // Начало сессии

// Подключение к базе данных
$dbHost = 'localhost';
$dbName = 'testingsystem';
$dbUser = 'postgres';
$dbPass = 'mysql';

try {
    $pdo = new PDO("pgsql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получение значения переменной $username
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Получение значения переменной $testName
    $testName = isset($_GET['testName']) ? $_GET['testName'] : '';

    // Подготовка и выполнение SQL-запроса
    $sql = "SELECT COUNT(*) AS count FROM results WHERE username = :username AND test_name = :testName AND is_correct = '1'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':testName', $testName, PDO::PARAM_STR);
    $stmt->execute();

    // Получение результата и вывод на экран
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Количество строк с username=$username, testName=$testName и is_correct=1: " . $result['count'];
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>

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
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Получение значений параметров test_name и username
$testName = isset($_SESSION['testName']) ? $_SESSION['testName'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

try {
    // Подготовка SQL-запроса для подсчета количества строк
    $sql = "SELECT COUNT(*) as count FROM results WHERE test_name = :testName AND username = :username AND is_correct = :isCorrect";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':testName', $testName, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $isCorrect = 1;
    $stmt->bindParam(':isCorrect', $isCorrect, PDO::PARAM_INT);

    // Выполнение запроса
    $stmt->execute();

    // Получение результата запроса
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Вывод количества строк на страницу
    echo "Количество строк таблицы results: " . $result['count'];
} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}
?>

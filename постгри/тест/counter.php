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

// Получение значений параметров test_name и username из сессии
$testName = isset($_SESSION['testName']) ? $_SESSION['testName'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

try {
    // Подготовка SQL-запроса для подсчета количества строк
    $countSql = "SELECT COUNT(*) as count FROM results WHERE test_name = :testName AND username = :username AND is_correct = :isCorrect";
    $countStmt = $pdo->prepare($countSql);
    $countStmt->bindParam(':testName', $testName, PDO::PARAM_STR);
    $countStmt->bindParam(':username', $username, PDO::PARAM_STR);
    $isCorrect = 1;
    $countStmt->bindParam(':isCorrect', $isCorrect, PDO::PARAM_INT);

    // Выполнение запроса
    $countStmt->execute();

    // Получение результата запроса
    $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);

    // Вывод количества строк на страницу
    echo "Количество строк таблицы results: " . $countResult['count'];

    // Сохранение количества строк, username и test_name в таблице student_result
    $saveSql = "INSERT INTO student_result (result, username, test_name) VALUES (:result, :username, :testName)";
    $saveStmt = $pdo->prepare($saveSql);
    $saveStmt->bindParam(':result', $countResult['count'], PDO::PARAM_INT);
    $saveStmt->bindParam(':username', $username, PDO::PARAM_STR);
    $saveStmt->bindParam(':testName', $testName, PDO::PARAM_STR);
    $saveStmt->execute();

    echo "Результат сохранен в таблице student_result.";
} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}
?>

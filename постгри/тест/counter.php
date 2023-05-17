<?php
session_start(); // Начало сессии

// Шаг 1: Подключение к базе данных
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

// Шаг 2: Получение значения поля "correct_answer" из таблицы "tests"
$sessionUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$testName = isset($_GET['testName']) ? $_GET['testName'] : '';

$sql = "SELECT correct_answer FROM tests WHERE test_name = :testName";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':testName', $testName);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $correctAnswer = $row["correct_answer"];
} else {
    // Обработка случая, если запись не найдена
    $correctAnswer = null;
}

// Шаг 3: Получение значения поля "answer" из таблицы "results" и подсчет правильных ответов и общего количества вопросов
$counterCorrectAnswers = 0;
$counterQuestions = 0;

$sql = "SELECT answer FROM results WHERE test_name = :testName";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':testName', $testName);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $counterQuestions++;

        $answer = $row["answer"];
        if ($answer == $correctAnswer) {
            $counterCorrectAnswers++;
        }
    }
}

// Шаг 4: Сохранение результатов в таблице "student_result"
$sql = "INSERT INTO student_result (username, result, questions) VALUES (:sessionUsername, :counterCorrectAnswers, :counterQuestions)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':sessionUsername', $sessionUsername);
$stmt->bindParam(':counterCorrectAnswers', $counterCorrectAnswers);
$stmt->bindParam(':counterQuestions', $counterQuestions);
$stmt->execute();

// Шаг 5: Вывод результатов на HTML страницу
echo "Количество правильных ответов: " . $counterCorrectAnswers . "<br>";
echo "Общее количество вопросов: " . $counterQuestions;
?>
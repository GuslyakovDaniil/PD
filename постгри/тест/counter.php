<?php
session_start(); // Начало сессии

// Получение значения параметра division из сессии
$division = isset($_SESSION['division']) ? $_SESSION['division'] : '';

// Запоминание значения в сессию
$_SESSION['division'] = $division;

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
    // Подготовка SQL-запроса для выборки значения поля questions из таблицы info
    $infoSql = "SELECT questions FROM info WHERE test_name = :testName";
    $infoStmt = $pdo->prepare($infoSql);
    $infoStmt->bindParam(':testName', $testName, PDO::PARAM_STR);

    // Выполнение запроса
    $infoStmt->execute();

    // Получение результата запроса
    $infoResult = $infoStmt->fetch(PDO::FETCH_ASSOC);

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

    // Сохранение количества строк, username, test_name и значения поля questions в таблице student_result
    $saveSql = "INSERT INTO student_result (result, username, test_name, questions, division) VALUES (:result, :username, :testName, :questions::varchar, :division)";
    $saveStmt = $pdo->prepare($saveSql);
    $saveStmt->bindParam(':result', $countResult['count'], PDO::PARAM_INT);
    $saveStmt->bindParam(':username', $username, PDO::PARAM_STR);
    $saveStmt->bindParam(':testName', $testName, PDO::PARAM_STR);
    $saveStmt->bindParam(':questions', $infoResult['questions'], PDO::PARAM_INT); // Преобразование в тип integer
    $saveStmt->bindParam(':division', $division, PDO::PARAM_STR); // Сохранение значения division
    $saveStmt->execute();

    echo "Результат сохранен в таблице student_result.";
} catch (PDOException $e) {
    die("Ошибка выполнения запроса: " . $e->getMessage());
}
?>

<style>
    .title_out{
position: absolute;
width: 154px;
height: 42px;
left: 987px;
top: 66px;
font-family: 'Forum';
font-style: normal;
text-decoration: none;
font-weight: 400;
font-size: 45px;
line-height: 50px;
display: flex;
align-items: center;
text-align: center;
color: #203A46;
}
</style>
<div class = "title_out"><a href="/PD/постгри/тест/exit.php">Выход</a></div>

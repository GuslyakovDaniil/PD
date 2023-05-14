<?php
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

// Получение текущего индекса строки
$currentRowIndex = isset($_POST['currentRowIndex']) ? $_POST['currentRowIndex'] : 0;

// Получение данных из базы данных
$stmt = $pdo->prepare("SELECT * FROM tests WHERE test_name = 'Узнать свой психологический возраст' LIMIT 1 OFFSET :offset");
$stmt->bindParam(':offset', $currentRowIndex, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Вывод данных в таблице и форме
if (!empty($row)) {
    echo '<table>';
    echo '<tr>';
    echo '<td>' . $row['test_name'] . '</td>';
    echo '<tr>';
    echo '<td>' . $row['question'] . '</td>';
    echo '<tr>';
    echo '<td>' . $row['option1'] . '</td>';
    echo '<tr>';
    echo '<td>' . $row['option2'] . '</td>';
    echo '<tr>';
    echo '<td>' . $row['option3'] . '</td>';
    echo '</tr>';
    echo '</table>';

    echo '<form method="POST">';
    echo '<input type="hidden" name="currentRowIndex" value="' . ($currentRowIndex + 1) . '">';

    echo '<input type="hidden" name="testName" value="' . htmlspecialchars($row['test_name']) . '">';
    echo '<input type="hidden" name="question" value="' . htmlspecialchars($row['question']) . '">';

    echo '<label>Введите ответ:</label>';
    echo '<input type="text" name="answer">';
    echo '<input type="submit" name="submit_answer" value="Отправить">';
    echo '</form>';
    echo '<br>';
} else {
    echo 'Вопросы закончились.';
}

// Обработка отправленной формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $answer = isset($_POST['answer']) ? $_POST['answer'] : '';
    $testName = isset($_POST['testName']) ? $_POST['testName'] : '';
    $question = isset($_POST['question']) ? $_POST['question'] : '';

    try {
        // Вставка ответа пользователя, test_name и question в базу данных
        $stmt = $pdo->prepare("INSERT INTO results (answer, test_name, question) VALUES (:answer, :test_name, :question)");
        $stmt->bindParam(':answer', $answer);
        $stmt->bindParam(':test_name', $testName);
        $stmt->bindParam(':question', $question);
        
        $stmt->execute();

        echo 'Ответ сохранен в базе данных.';
    } catch (PDOException $e) {
        echo 'Ошибка сохранения ответа: ' . $e->getMessage();
    }
}

?>
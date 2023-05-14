<?php
// Подключение к базе данных PostgreSQL
$host = 'localhost';
$dbname = 'testingsystem';
$username = 'postgres';
$password = 'mysql';

try {
    $dbh = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    exit();
}

// Переменные для хранения значений полей
$testName = $question = $option1 = $option2 = $option3 = $correctAnswer = '';

// Обработка нажатия кнопки "Добавить вопрос"
if (isset($_POST['add_question'])) {
    $testName = $_POST['test_name'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $correctAnswer = $_POST['correct_answer'];

    // Подготовка SQL-запроса
    $stmt = $dbh->prepare("INSERT INTO tests (test_name, question, option1, option2, option3, correct_answer) VALUES (?, ?, ?, ?, ?, ?)");

    // Выполнение SQL-запроса с передачей данных через параметры
    $stmt->execute([$testName, $question, $option1, $option2, $option3, $correctAnswer]);

    // Очистка полей формы (кроме поля "Название теста")
    $question = $option1 = $option2 = $option3 = $correctAnswer = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Создание теста</title>
</head>
<body>
    <h1>Создание теста</h1>
    <form method="post" action="">
        <label>Название теста:</label>
        <input type="text" name="test_name" value="<?php echo $testName; ?>"><br>

        <label>Вопрос:</label>
        <input type="text" name="question" value="<?php echo $question; ?>"><br>

        <label>1 вариант ответа:</label>
        <input type="text" name="option1" value="<?php echo $option1; ?>"><br>

        <label>2 вариант ответа:</label>
        <input type="text" name="option2" value="<?php echo $option2; ?>"><br>

        <label>3 вариант ответа:</label>
        <input type="text" name="option3" value="<?php echo $option3; ?>"><br>

        <label>Правильный ответ:</label>
        <input type="text" name="correct_answer" value="<?php echo $correctAnswer; ?>"><br>

        <input type="submit" name="add_question" value="Добавить вопрос">
        <input type="button" onclick="location.href='personal_cabinet.php'" value="Выход">
    </form>
</body>
</html>
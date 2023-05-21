<?php
session_start();

// Проверяем, авторизован ли пользователь
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

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

// Обработка формы при нажатии на кнопку поиска
if (isset($_POST['search'])) {
    $testName = $_POST['test_name'];

    // Подготовленный запрос для получения данных из таблицы
    $stmt = $pdo->prepare("SELECT test_name, questions, result FROM student_result WHERE username = :username AND test_name = :testName");
    $stmt->execute(array(':username' => $username, ':testName' => $testName));
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Страница поиска теста</title>
</head>
<body>
    <h1>Страница поиска теста</h1>

    <form method="POST">
        <label for="test_name">Название теста:</label>
        <input type="text" name="test_name" id="test_name">

        <input type="submit" name="search" value="Поиск">
        <a href="logout.php">Выход</a>
    </form>

    <?php if (isset($results)): ?>
        <h2>Результаты поиска:</h2>
        <?php if (count($results) > 0): ?>
            <table>
                <tr>
                    <th>Название теста</th>
                    <th>Вопросы</th>
                    <th>Результат</th>
                </tr>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['test_name']; ?></td>
                        <td><?php echo $row['questions']; ?></td>
                        <td><?php echo $row['result']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Нет результатов для отображения.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

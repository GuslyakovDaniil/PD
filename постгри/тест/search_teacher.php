<?php
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

// Обработка формы поиска
if (isset($_POST['search'])) {
    $testName = $_POST['test_name'];
    $username = $_POST['username'];
    $division = $_POST['division'];

    $query = "SELECT test_name, username, questions, result, division FROM student_result WHERE 1 = 1";

    if (!empty($division)) {
        $query .= " AND division = :division";
    }

    if (!empty($username)) {
        $query .= " AND username = :username";
    }

    if (!empty($testName)) {
        $query .= " AND test_name = :test_name";
    }

    $stmt = $pdo->prepare($query);

    if (!empty($division)) {
        $stmt->bindValue(':division', $division);
    }

    if (!empty($username)) {
        $stmt->bindValue(':username', $username);
    }

    if (!empty($testName)) {
        $stmt->bindValue(':test_name', $testName);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Поиск результата теста</title>
</head>
<body>
    <h1>Поиск результата теста</h1>
    <form method="post" action="">
        <label for="test_name">Название теста:</label>
        <input type="text" id="test_name" name="test_name">

        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username">

        <label for="division">Подразделение:</label>
        <input type="text" id="division" name="division">

        <input type="submit" name="search" value="Поиск">
        <a href="logout.php">Выход</a>
    </form>

    <?php if (isset($results)): ?>
        <h2>Результаты поиска:</h2>
        <?php if (count($results) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Название теста</th>
                        <th>Имя пользователя</th>
                        <th>Группа</th>
                        <th>Кол-во вопросов</th>
                        <th>Результат</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['test_name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['division']; ?></td>
                            <td><?php echo $row['questions']; ?></td>
                            <td><?php echo $row['result']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Нет результатов.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

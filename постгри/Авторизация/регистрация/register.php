<?php
// Подключение к базе данных PgAdmin4
$dbhost = 'localhost'; // адрес хоста базы данных
$dbname = 'testingsystem'; // имя базы данных
$dbuser = 'postgres'; // имя пользователя базы данных
$dbpass = 'mysql'; // пароль пользователя базы данных

try {
    $dbh = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}

// Обработка отправленной формы регистрации
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $username = $_POST['username'];
    $password = $_POST['password'];
    $accessLevel = $_POST['access_level'];
    $fullName = $_POST['full_name'];
    $age = $_POST['age'];
    $division = $_POST['division'];

    // Проверка наличия уже существующего логина
    $stmt_check = $dbh->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt_check->bindParam(':username', $username);
    $stmt_check->execute();
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        echo 'Пользователь с таким логином уже существует.';
        return;
    }

    // Валидация данных (можно добавить дополнительные проверки, например, на длину пароля)
    if (empty($username) || empty($password) || empty($accessLevel) || empty($fullName)|| empty($division)) {
        echo 'Заполните все поля формы регистрации.';
    } else {
        // Хеширование пароля
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Вставка данных пользователя в базу данных
            $stmt = $dbh->prepare("INSERT INTO users (username, password, access_level, full_name, age, division) VALUES (:username, :password, :access_level, :full_name, :age, :division)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':access_level', $accessLevel);
            $stmt->bindParam(':full_name', $fullName);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':division', $division);

            $stmt->execute();

            echo 'Регистрация успешна. Можете войти на сайт.';
        } catch (PDOException $e) {
            echo 'Ошибка регистрации: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form method="POST" action="">
        <label>Имя пользователя:</label>
        <input type="text" name="username" required><br><br>
        <label>Пароль:</label>
        <input type="password" name="password" required><br><br>
        <label>Уровень доступа:</label>
        <input type="text" name="access_level" required><br><br>
        <label>ФИО:</label>
        <input type="text" name="full_name" required><br><br>
        <label>Возраст:</label>
        <input type="text" name="age" required><br><br>
        <label>Принадлежность:</label>
        <input type="text" name="division" required><br><br>
        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>




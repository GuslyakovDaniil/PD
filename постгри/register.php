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

    // Валидация данных (можно добавить дополнительные проверки, например, на длину пароля)
    if (empty($username) || empty($password)) {
        echo 'Заполните все поля формы регистрации.';
    } else {
        // Хеширование пароля
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Вставка данных пользователя в базу данных
            $stmt = $dbh->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
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
        <input type="submit" value="Зарегистрироваться">
    </form>
</body>
</html>
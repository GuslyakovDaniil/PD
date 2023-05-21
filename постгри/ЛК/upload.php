<?php
// Проверка наличия загруженного файла
if(isset($_FILES['images'])) {
    // Установка параметров для подключения к базе данных
    $dbhost = 'localhost';
    $dbname = 'testingsystem';
    $dbuser = 'postgres';
    $dbpass = 'mysql';

    try {
        // Установка соединения с базой данных
        $conn = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

        // Установка режима обработки ошибок
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Получение значения username из сессии
        session_start();
        $username = $_SESSION['username'];

        // Подготовка SQL-запроса для вставки данных в таблицу "images"
        $query = "INSERT INTO images (image_data) VALUES (:image_data)";
        $stmt = $conn->prepare($query);

        // Чтение содержимого файла и привязка его к параметру :image_data
        $imageData = file_get_contents($_FILES['images']['tmp_name']);
        $stmt->bindParam(':image_data', $imageData, PDO::PARAM_LOB);

        // Выполнение запроса
        $stmt->execute();

        echo 'Изображение успешно загружено в базу данных.';
        echo '<br>';
        echo '<a href="ЛК/index_lk_student.php">Перейти на страницу index_ik_student.php</a>';
    } catch (PDOException $e) {
        echo 'Ошибка при загрузке изображения в базу данных: ' . $e->getMessage();
    }
} else {
    echo 'Файл не найден.';
}
?>
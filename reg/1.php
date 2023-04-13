<?php
// подключение к базе данных
$conn = mysqli_connect('localhost', 'root', 'mysql', 'registration');

// получение id из GET-запроса
$id = $_GET['id'];

// параметризованный запрос
$query = 'SELECT username FROM users WHERE id = ?';
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// вывод данных на страницу
while ($row = mysqli_fetch_assoc($result)) {
    echo htmlspecialchars($row['tusername']);
}
?>

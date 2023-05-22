<?php
session_start();

// Уничтожение всех данных сессии
session_destroy();

// Редирект на страницу входа
header('Location: /PD/постгри/тест/Нач стр/index.php');
exit();
?>
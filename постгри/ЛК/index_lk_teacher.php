<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<style>
body{
position: relative;
width: 1519px;
height: 726px;
background: #FFFFFF;
}

.back_phone{
position: absolute;
width: 1519px;
height: 712px;
left: 0px;
top: 0px;
background: url(last/fone_back.png);
}
        
.box_logo{
max-height: 1000px;
max-width: 1000px;
}

.box_logo{
position: absolute;
width:450px;
height: 310px;
top: -33px;
left: -15px;
margin: 0;
padding: 0;
}
.logo{
width: 100%;
height: 100%;
background: url(last/logotip.png) no-repeat;
}

.title_create_test{
position: absolute;
width: 299px;
height: 43px;
left: 430px;
top: 66px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 45px;
line-height: 50px;
display: flex;
align-items: center;
text-align: center;
color: #203A46;
}


.title_result{
position: absolute;
width: 248px;
height: 42px;
left: 742px;
top: 66px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 45px;
line-height: 50px;
display: flex;
align-items: center;
text-align: center;
color: #203A46;
}


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

.box{
position: absolute;
width: 879px;
height: 388px;
left: calc(50% - 879px/2 - 224px);
top: 199px;
background: #D9D9D9;
border-radius: 30px;
}

.avatar{
position: absolute;
width: 397px;
height: 374px;
left: 80px;
top: 215px;
background: url(last/teacher.png);
}

.box_backgraund{
position: absolute;
width: 419px;
height: 47px;
left: 440px;
top: 272px;
background: #C1C1C1;
border-radius: 20px;
}

.box_name{
position: absolute;
width: 419px;
height: 47px;
left: 440px;
top: 274px;
background: #C1C1C1;
border-radius: 20px;
}

.title_name{
position: absolute;
width: 71px;
height: 37px;
left: 452px;
top: 235px;
font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
display: flex;
align-items: center;
text-transform: capitalize;
color: #000000;
}

.title_departament{
position: absolute;
width: 115px;
height: 37px;
left: 452px;
top: 319px;
font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
display: flex;
align-items: center;
text-transform: capitalize;
color: #000000;
}

.box_page{
position: absolute;
width: 230px;
height: 47px;
left: 440px;
top: 433px;
background: #C1C1C1;
border-radius: 20px;
}

.title_page{
position: absolute;
width: 115px;
height: 38px;
left: 452px;
top: 397px;
font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
display: flex;
align-items: center;
text-transform: capitalize;
color: #000000;
}
.box_departament{
position: absolute;
width: 230px;
height: 47px;
left: 440px;
top: 353px;
background: #C1C1C1;
border-radius: 20px;
        }
.box_name_text{
position: absolute;
width: 419px;
height: 47px;
left: 455px;
top: 284px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
        }
.box_departament_text{
position: absolute;
width: 419px;
height: 47px;
left: 455px;
top: 363px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
        }
.box_page_text{
position: absolute;
width: 419px;
height: 47px;
left: 455px;
top: 440px;
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
        }
    </style>
</head>
<?php
// Предполагая, что сессия уже запущена
session_start();
// Получение значения параметра username из сессии
$division = isset($_SESSION['division']) ? $_SESSION['division'] : '';


// Запоминание значений в сессию
$_SESSION['division'] = $division;

// Получение значения username из сессии
$username = $_SESSION['username'];

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

    // Подготовка SQL-запроса с использованием подстановки параметров
    $query = "SELECT full_name, division, age FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    
    // Выполнение запроса
    $stmt->execute();

    // Получение результатов
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
    exit;
}

// Получение значений полей
$full_name = $result['full_name'];
$division = $result['division'];
$age = $result['age'];
?>
<body>
    <div class = "box_backgraund"></div>
    <div class = "back_phone"></div>
    <div class = "box"></div>
    <div class = "box_logo">
    <div class="avatar"></div>
        <div class = "logo"></div>
    </div>
    <div class = "title_create_test"><a href="/PD/постгри/Готово/index_creat_test.php">Создание теста</a></div>
    <div class = "title_result"><a href="/PD/постгри/тест/search_teacher.php">Результаты</a></div>
    <div class = "title_out"><a href="/PD/постгри/тест/exit.php">Выход</a></div>
    <div class = "title_name">Ф.И.О.:</div>
        <div class = "box_name"></div>
    <div class="box_name_text"><?php echo $full_name; ?></div>
    <div class = "title_departament">Кафедра:</div>
        <div class = "box_departament"></div>
    <div class="box_departament_text"><?php echo $division; ?></div>
    <div class = "title_page">Возраст:</div>
        <div class = "box_page"></div>
    <div class="box_page_text"><?php echo $age; ?></div>
</body>
</html>


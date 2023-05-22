<?php
session_start(); // Начало сессии

// Получение значения параметра testName из GET-запроса
$testName = isset($_GET['testName']) ? $_GET['testName'] : '';

// Получение значения параметра username из сессии
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Получение значения параметра division из сессии
$division = isset($_SESSION['division']) ? $_SESSION['division'] : '';

// Запоминание значений в сессию
$_SESSION['testName'] = $testName;
$_SESSION['username'] = $username;
$_SESSION['division'] = $division;

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="./css/main.css" rel="stylesheet" />
        <title>Document</title>
        <style>
            * {
  box-sizing: border-box;
}
body {
  font-size: 14px;
}
.v1_111 {
  width: 100%;
  height: 726px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v1_112 {
  width: 100%;
  height: 726px;
  background: url("../images/v1_112.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v1_113 {
  width: 789px;
  height: 542px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 143px;
  left: 374px;
  border-top-left-radius: 30px;
  border-top-right-radius: 30px;
  border-bottom-left-radius: 30px;
  border-bottom-right-radius: 30px;
  overflow: hidden;
}
.v1_114 {
  width: 489px;
  height: 44px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 518px;
  left: 458px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
}
.v1_115 {
  width: 321px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 492px;
  left: 470px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 25px;
  opacity: 1;
  text-align: left;
}
.v1_117 {
  width: 104px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 271px;
  left: 438px;
  font-family: 'Forum';
  font-weight: 'Regular';
  text-align: left;
  font-size:30px;
}
.v1_118 {
  width: 240px;
  height: 44px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 604px;
  left: 426px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
}
.v1_119 {
  width: 361px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 569px;
  left: 438px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size:25px;
  opacity: 1;
  text-align: left;
}
.v1_120 {
  width: 493px;
  height: 43px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 378px;
  left: 458px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
}
.v1_121 {
  width: 107px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 352px;
  left: 470px;
  font-family: 'Forum';
  font-weight: 'Regular';
  opacity: 1;
  text-align: left;
  font-size: 25px;
}
.v1_122 {
  width: 493px;
  height: 43px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 447px;
  left: 458px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
}
.v1_123 {
  width: 112px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 421px;
  left: 470px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 25px;
  opacity: 1;
  text-align: left;
}
.v1_124 {
  width: 154px;
  height: 61px;
  background: rgba(19,21,87,1);
  opacity: 1;
  position: absolute;
  top: 587px;
  left: 962px;
    border-radius: 20px;
}
.v1_125 {
  width: 154px;
  color: rgba(202,202,202,1);
  position: absolute;
  top: 597px;
  left: 962px;
  font-family: 'Forum';
  font-weight: Regular;
  font-size: 30px;
  opacity: 1;
  text-align: center;
  text-decoration: none;
}
.v1_126 {
  width: 156px;
  height: 61px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 62px;
  left: 62px;
  border-radius: 20px;
}
.v1_127 {
  width: 156px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 72px;
  left: 62px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 30px;
  opacity: 1;
  text-align: center;
    text-decoration: none;
}
.v1_128 {
  width: 212px;
  height: 131px;
  background: url("../images/v1_128.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  opacity: 1;
  position: absolute;
  top: 123px;
  left: 935px;
  overflow: hidden;
}
            .name{
  width: 256px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 162px;
  left: 632px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 30px;
  opacity: 1;
  text-align: center;
    text-decoration: none;
}
            input{
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 30px;
text-align: center;
}
            .name_test{
  width: 736px;
  height: 38px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 210px;
  left: 402px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 28px;
  text-align: center;
  text-decoration: none;
}
            .question{
  width: 736px;
  height: 38px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 307px;
  left: 212px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 28px;
  text-align: center;
  text-decoration: none;
            }
            .first_answer{
                width: 736px;
  height: 38px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 383px;
  left: 472px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 28px;
  text-decoration: none;
            }
            .second_answer{
                width: 736px;
  height: 38px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 452px;
  left: 472px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 28px;
  text-decoration: none;
            }
            .third_answer{
                width: 736px;
  height: 38px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 524px;
  left: 472px;
  font-family: 'Forum';
  font-weight: 'Regular';
  font-size: 28px;
  text-decoration: none;
            }
            .correct_answer{
                position: absolute;
                top:604px;
                left:427px;
            }
            .next{
                position: absolute;
                top: 587px;
                left: 962px;
            }
            .out{
                position: absolute;
                top: 62px;
                left: 62px;
            }

        </style>
    </head>
    <body>
        <div class="v1_111">
            <div class="v1_112"></div>
            <div class="v1_113"></div>
            <div class="v1_114"></div>
            <span class="name"><?php echo $division ?></span>
            <div class="box_name"></div>
            <span class="v1_115">Ответ 3:</span>
            <div class="v1_116"></div>
            <span class="v1_117">Вопрос:</span>
            <div class="v1_118"></div>
            <span class="v1_119">Правильный ответ:</span>
            <div class="v1_120"></div>
            <span class="v1_121">Ответ 1:</span>
            <div class="v1_122"></div>
            <span class="v1_123">Ответ 2:</span>
            <div class="v1_124"></div>
            <span class="v1_125">Далее</span>
            <div class="v1_126"></div>
            <div class="v1_127"><a href="/PD/постгри/тест/exit.php">Выход</a></div>
            <div class="v1_128"></div>
            <form method="post" action="">
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

        // Получение переданного значения "testName" из предыдущей страницы
        $testName = isset($_SESSION['testName']) ? $_SESSION['testName'] : '';

        // Получение текущего индекса строки
        $currentRowIndex = isset($_POST['currentRowIndex']) ? $_POST['currentRowIndex'] : 0;

        // Получение имени пользователя из сессии
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

        // Получение значения параметра division из сессии
        $division = isset($_SESSION['division']) ? $_SESSION['division'] : '';


        // Получение данных из базы данных для указанного теста
        $stmt = $pdo->prepare("SELECT * FROM tests WHERE test_name = :testName LIMIT 1 OFFSET :offset");
        $stmt->bindParam(':testName', $testName);
        $stmt->bindParam(':offset', $currentRowIndex, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Обработка отправленной формы
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получение данных из формы
            $answer = isset($_POST['answer']) ? $_POST['answer'] : '';
            $testName = isset($_POST['testName']) ? $_POST['testName'] : '';
            $question = isset($_POST['question']) ? $_POST['question'] : '';
            $rightAnswer = isset($_POST['rightAnswer']) ? $_POST['rightAnswer'] : '';

            // Сравнение значений полей и установка значения поля "is_correct"
            $isCorrect = ($answer === $rightAnswer) ? 1 : 0;

            try {
                // Вставка ответа пользователя, test_name, question, right_answer, is_correct, username и division в базу данных
                $stmt = $pdo->prepare("INSERT INTO results (answer, test_name, question, right_answer, is_correct, username, division) VALUES (:answer, :test_name, :question, :right_answer, :is_correct, :username, :division)");
                $stmt->bindParam(':answer', $answer);
                $stmt->bindParam(':test_name', $testName);
                $stmt->bindParam(':question', $question);
                $stmt->bindParam(':right_answer', $rightAnswer);
                $stmt->bindParam(':is_correct', $isCorrect);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':division', $division);

                $stmt->execute();

            } catch (PDOException $e) {
                echo 'Ошибка сохранения ответа: ' . $e->getMessage();
            }
        }
        ?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form method="post" action="">
    <?php
        // Вывод данных в таблице и форме
        if (!empty($row)) {
            echo '<input type="hidden" name="currentRowIndex" value="' . ($currentRowIndex + 1) . '">';
            echo '<input type="hidden" name="testName" value="' . htmlspecialchars($testName) . '">';
            echo '<input type="hidden" name="question" value="' . htmlspecialchars($row['question']) . '">';
            echo '<input type="hidden" name="rightAnswer" value="' . htmlspecialchars($row['correct_answer']) . '">';
            echo '<input class="correct_answer" style="border-radius: 18px; width: 239px;height: 44px;background: transparent;border: none;" type="text" name="answer" value="">';
            echo '<input class="next" style="width: 156px;height: 61px;border-radius: 20px;background: transparent;border: none;" type="submit" name="submit_answer" value="">';
            echo '</form>';
            echo '<br>';
        } else {
            echo '<script>window.location.href = "/PD/постгри/тест/counter.php";</script>'; // перенаправление на другую страницу после последнего вопроса
            exit();
        }
        ?>
        <a class="name_test"><?php echo '<td>' . $row['test_name'] . '</td>'; ?></a>
        <a class="question"><?php echo '<td>' . $row['question'] . '</td>'; ?></a>
        <a class="first_answer"><?php echo '<td>' . $row['option1'] . '</td>'; ?>.</a>
        <a class="second_answer"><?php echo '<td>' . $row['option2'] . '</td>'; ?></a>
        <a class="third_answer"><?php echo '<td>' . $row['option3'] . '</td>'; ?></a>
        <div class="out">
            <input style="width: 156px;height: 61px;border-radius: 20px;background: transparent;border: none;" type="button" onclick="location.href='index_lk_student.php'">
        </div>
    </form>
</body>
</html>
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
    // Получение значения поля test_name
    $testName = $_POST['test_name'];

    // Выполнение SQL-запроса с передачей значения test_name через параметр
    $stmt = $dbh->prepare("SELECT questions FROM info WHERE test_name = ?");
    $stmt->execute([$testName]);
    $result = $stmt->fetch();

    if ($result) {
        // Обновление значения количества вопросов
        $questionsCount = $result['questions'] + 1;

        $updateQuery = "UPDATE info SET questions = ? WHERE test_name = ?";
        $stmt = $dbh->prepare($updateQuery);
        $stmt->execute([$questionsCount, $testName]);
    } else {
        // Вставка новой записи, если теста еще нет в таблице info
        $insertInfoQuery = "INSERT INTO info (test_name, questions) VALUES (?, ?)";
        $stmt = $dbh->prepare($insertInfoQuery);
        $stmt->execute([$testName, 1]);
    }

    // Остальной код для добавления вопроса в таблицу tests
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $correctAnswer = $_POST['correct_answer'];

    // Подготовка SQL-запроса
    $insertQuestionQuery = "INSERT INTO tests (test_name, question, option1, option2, option3, correct_answer) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($insertQuestionQuery);

    // Выполнение SQL-запроса с передачей данных через параметры
    $stmt->execute([$testName, $question, $option1, $option2, $option3, $correctAnswer]);

    // Очистка полей формы (кроме поля "Название теста")
    $question = $option1 = $option2 = $option3 = $correctAnswer = '';
}
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
.v1_116 {
  width: 498px;
  height: 44px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 306px;
  left: 426px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
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
            .box_name{
  width: 698px;
  height: 44px;
  background: rgba(192,192,192,1);
  opacity: 1;
  position: absolute;
  top: 206px;
  left: 426px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  overflow: hidden;
}
            input{
font-family: 'Forum';
font-style: normal;
font-weight: 400;
font-size: 30px;
text-align: center;
}
            .name_test{
                position: absolute;
                top:206px;
                left:426px;

            }
            .question{
                position: absolute;
                top:306px;
                left:426px;
            }
            .first_answer{
                position: absolute;
                top:378px;
                left:459px;
            }
            .second_answer{
                position: absolute;
                top:446px;
                left:459px;
            }
            .third_answer{
                position: absolute;
                top:518px;
                left:459px;
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
            <span class="name">Название теста:</span>
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
            <span class="v1_127">Выход</span>
            <div class="v1_128"></div>
            <form method="post" action="">
                <div class="name_test">   
                    <input style="border-radius: 18px; width: 697px;height: 44px;background: transparent;border: none;" type="text" name="test_name" value="<?php echo $testName; ?>"><br>
                </div>
                <div class="question">
                    <input style="border-radius: 18px; width: 497px;height: 44px;background: transparent;border: none;" type="text" name="question" value="<?php echo $question;?>"><br>
                </div>
                <div class="first_answer">
                    <input style="border-radius: 18px; width: 491px;height: 44px;background: transparent;border: none;" type="text" name="option1" value="<?php echo $option1; ?>"><br>
                </div>
                <div class="second_answer">
                    <input style="border-radius: 18px; width: 491px;height: 44px;background: transparent;border: none;" type="text" name="option2" value="<?php echo $option2; ?>"><br>
                </div>
                <div class="third_answer">
                    <input style="border-radius: 18px; width: 490px;height: 44px;background: transparent;border: none;" type="text" name="option3" value="<?php echo $option3; ?>"><br>
                </div>
                <div class="correct_answer">
                    <input style="border-radius: 18px; width: 239px;height: 44px;background: transparent;border: none;" type="text" name="correct_answer" value="<?php echo $correctAnswer; ?>"><br>
                </div>
                <div class="next">
                    <input style="width: 156px;height: 61px;border-radius: 20px;background: transparent;border: none;" type="submit" name="add_question" value="">
                </div>
                <div class="out">
                    <input style="width: 156px;height: 61px;border-radius: 20px;background: transparent;border: none;" type="button" onclick="location.href='/PD/постгри/тест/Нач стр/index.php'">
                </div>
            </form>
        </div>
    </body>
</html>
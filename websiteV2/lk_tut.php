<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Личный кабинет преподавателя</title>
  <style>
    body {
      background-color: #1a1a2e;
      color: white;
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }
    /*верхняя панель*/
    #header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: rgba(54, 55, 80, 0.68);
    }
    #header h1 {
      margin: 0;
      font-size: 36px;
      text-transform: capitalize;
    }
    #header a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      padding: 10px;
      border-radius: 5px;
      background-color: #4c4c7f;
    }
    #header a:hover {
      background-color: #6d6da3;
    }
    #content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 100px);
    }
    #content h2 {
      margin: 0;
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }
    #content p {
      margin: 0;
      font-size: 18px;
      text-align: center;
    }
  </style>
</head>
<body>
<div id="header">
  <h1>Личный кабинет преподавателя</h1>
  <div>
    <a href="/PD/websiteV2/lk_tut.html">личный кабинет</a>
    <a href="/PD/websiteV2/create_test.html">создать тест</a>
    <a href="/PD/websiteV2/resTest_tut.html">результаты</a>
    <a href="/PD/website/choise.html">выход</a>
  </div>
</div>
<div id="content">
  <h2>
    <?php
    session_start();
    if(isset($_SESSION['username'])) {
      echo 'Добро пожаловать, ' . $_SESSION['username'] . '!';
    } else {
      header('location: /PD/websiteV2/login.php');
    }
    ?>
  </h2>
  <p>
    <?php
    // connect to the database
    $db = mysqli_connect('localhost', 'root', 'mysql', 'teacher-bd');

    // get the department name for the current user
    $username = $_SESSION['username'];
    $query = "SELECT name_of_the_department FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);
    $department = mysqli_fetch_assoc($result)['name_of_the_department'];

    // display the department name
    echo $department;
    ?>
  </p>
</div>
</body>
</html>
<?php include('server_st.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
         body {
            background-color: rgba(113, 161, 206, 1); /* добавлено свойство заднего фона */
        }
        body {
      background-color: rgba(113, 161, 206, 1);
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
      padding: 0px;
      background-color: rgba(19, 21, 87, 1);
    }
    #header1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0px;
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
      margin-right: 15px;
      padding: 10px;
      border-radius: 8px;
      background-color: #4c4c7f;
    }
    #header a:hover {
      background-color: #6d6da3;
    }
    #header a:last-of-type {
  margin-right: 20px;
}
    #content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 100px);
    }
    #content h2 {
      margin: -150px;
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }
    #content p {
      margin: 0;
      font-size: 18px;
      text-align: center;
    }
    /* стиль для блока с кнопками */
    #header .btn-container {
      display: flex;
      align-items: center;
    }
    /* стиль для каждой кнопки */
    #header .btn-container a {
      margin-left: 10px;
    }
    #photo2 {
  position: absolute;
  top: 110px;
  right: 0;
  margin-right: 600px;
  margin-top: 10px;
  width: 60px;
  height: 60px;
}
#text {
  margin-top: -250px;
  padding: 10px;
  margin-right: 700px;
  width: 600px;
  height: 300px;
  letter-spacing: 2px;
}
.button {
  color: rgb(0, 0, 0);
  text-decoration: none;
  margin-left: 20px;
  padding: 10px;
  border-radius: 8px;
  background-color: #ffffff;
}
.button:hover {
  background-color: #6d6da3;
}
  </style>
</head>
<body>
<div id="header">
<img src="/2/images/RjB1TsuOyUU.jpg" alt="Фотография преподавателя" style="width: 420px; height: 100px; margin-right: 10px; margin: 0;">
  <div class="btn-container">
    <a href="/PD/reg/login.php">Преподаватель</a>
    <a href="\2\index.html">Начальная страница</a>
    <a href="/PD/websiteV2/ResTest_st.php">Соцсети</a>
    <a href="/PD/website/choise.html">Навигация</a>
  </div>
</div>
    </style>
</head>
<body>
<div class="header">
    <h2>Login</h2>
</div>

<form method="post" action="login_st.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
    Exit to the home page <a href="/PD/website/choise.html">Enter</a>
    </p>
</form>
</body>
</html>
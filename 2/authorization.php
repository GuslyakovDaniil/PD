<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Начальная страница</title>
  <style>
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
.wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-template-rows: auto;
  grid-gap: 20px;
}

.teacher-form, .student-form {
  background-color: rgba(217, 217, 217, 1);
  padding: 20px;
  border-radius: 20px;
}

.teacher-form .teacher-form-heading, .student-form .student-form-heading {
  color: rgba(255, 255, 255, 1);
  background-color: rgba(19, 21, 87, 1);
  margin-top: 0;
  text-align: center;
  padding: 10px;
  border-radius: 20px 20px 0 0;
}

.teacher-form input, .student-form input {
  background-color: rgba(193, 193, 193, 1);
  border-radius: 8px;
  padding: 10px;
  margin-bottom: 10px;
}

.teacher-form button, .student-form button {
  margin: 0 auto;
  display: block;
  margin-top: 10px;
}argin-top: 10px;
  </style>
</head>
<body>
<div id="header">
    <img src="images\RjB1TsuOyUU.jpg" alt="Фотография студента" style="width: 420px; height: 100px; margin-right: 10px; margin: 0;">
  <div class="btn-container">
    <a href="/PD/websiteV2/lk_st2.php">Начальная страница</a>
    <a href="/PD/websiteV2/test_st.html">Дисциплины</a>
    <a href="/PD/websiteV2/ResTest_st.php">Преподаватели</a>
    <a href="/PD/website/choise.html">Навигация</a>
  </div>
</div>
<div id="content">
  <a>Авторизация</a>
  <div class="wrapper">
  <form class="teacher-form">    <h3 class="teacher-form-heading">Преподаватель</h3>
    <input type="text" placeholder="Login">
    <input type="password" placeholder="Password">
    <button type="submit">Подтвердить</button>
  </form>
  <form class="student-form">
    <h3 class="student-form-heading">Студент</h3>
    <input type="text" placeholder="Login">
    <input type="password" placeholder="Password">
    <button type="submit">Подтвердить</button>
  </form>
</div>
  </div>
</body>
</html>
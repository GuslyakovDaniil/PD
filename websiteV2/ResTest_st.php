<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Результаты теста</title>
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
      height: calc(78vh - 100px);
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
  <h1>Результаты теста</h1>
  <div>
    <a href="/PD/websiteV2/lk_st2.php">личный кабинет</a>
    <a href="/PD/websiteV2/test_st.html">тесты</a>
    <a href="/PD/websiteV2/Restest_st.php">результаты</a>
    <a href="/PD/website/choise.html">выход</a>
  </div>
</div>
<div id="content">
  <h1>Поиск результата прохождения теста</h1>
  <form method="get" action="search_results.php">
    <label for="title">Название теста:</label>
    <input type="text" id="title" name="title" required>
    <button type="submit">Искать</button>
  </form>
</body>
</div>
</body>
</html>
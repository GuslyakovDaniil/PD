<?php include('server_st.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-color: #5a6bc4; /* добавлено свойство заднего фона */
        }
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
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration tutor</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-color: #1a1a2e; /* добавлено свойство заднего фона */
        }
    </style>
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>

<form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <label>Name of the department</label>
        <input type="text" name="name_of_the_department">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
    Exit to the home page <a href="/PD/website/choise_adm.html">Enter</a>
    </p>
</form>
</body>
</html>
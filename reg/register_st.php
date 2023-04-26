<?php include('server_st.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration student</title>
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

<form method="post" action="register_st.php">
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
        <label>Group</label>
        <input type="text" name="group_number">
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
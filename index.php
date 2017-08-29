<?php
require 'add.php';
    if(isset($_SESSION['logged_user'])) : ?>
     <h1>Здравствуйте, <?php echo $_SESSION['logged_user']['login']; ?>!</h1>
     <a href="logout.php">Выйти</a>
<?php else : ?>
    <a href="login.php">Авторизоваться</a>
    <a href="reg.php">Регистрация</a>
<?php endif ; ?>


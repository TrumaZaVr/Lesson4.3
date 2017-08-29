<?php
require 'add.php';
$data = $_POST;
if(isset($data['do_login'])) {
    $errors = array();
    $sql = "SELECT * FROM user WHERE login = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute(["{$_POST['login']}"]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
        if(password_verify($data['password'],$user['password'])){
            $_SESSION['logged_user'] = $user;
            echo '<div style="color: green;">Успешная авторизация!</div><hr>';
           header('Location: ./index.php');
        }else{
            $errors[] = 'Пароль не верный!';
        }
    } else {
        $errors[] = 'Пользователь не найден!';
    }
    if( !empty($errors)){
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }

}
?>

<form action="login.php" method="POST">
    <p>
        <p><strong>Логин</strong>:</p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>
    <p>
    <p><strong>Пароль</strong>:</p>
    <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>
        <button type="submit" name="do_login">Афторизоваться</button>
    </p>
</form>

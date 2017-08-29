<?php
require 'add.php';
$data = $_POST;
if(isset($data['do_reg'])) {

    $errors = array();
    if( trim($data['login']) == '' )
    {
    $errors[] = 'Введите логин!';
    }

    if( trim($data['password']) == '' )
    {
        $errors[] = 'Введите пароль!';
    }

    if($data['password_2'] != $data['password'])
    {
        $errors[] = 'Повторный пароль введен не верно!';
    }

    if( empty($errors)){
        $sql = "INSERT INTO user (login, password) VALUES (?, ?)";
        $stm = $pdo->prepare($sql);
        $usrpassword = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $stm->execute(["{$_POST['login']}", "{$usrpassword}"]);
        echo '<div style="color: green;">Успешная регистрация!</div><hr>';
        header('Location: ./login.php');
    } else {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}

?>

<form action="reg.php" method="POST">
    <p>
        <p><strong>Ваш логин</strong>:</p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>


    <p>
    <p><strong>Ваш пароль</strong>:</p>
    <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
    <p><strong>Ваш пароль еще</strong>:</p>
    <input type="password" name="password_2">
    </p>

    <p>
        <button type="submit" name="do_reg">Зарегистрироваться</button>
    </p>

</form>

<?php
include('base.php');
include('functions.php');
include('user.php');

if ($user) {
    header('location: /les/cabinet.php');
    exit();
}
$login = text($_POST['login']);
$password = text($_POST['password']);
if (isset($_POST['registration'])) {
    if (strlen($login) < 3 or strlen($login) > 15) {
        echo 'Длина 3-15 символов!';
    } else {
        if (strlen($password) < 5 or strlen($password) > 18) {
            echo 'Длина пароля 5-18 символов!';
        } else {
            $success_login = mysql_query('SELECT * FROM `users` where `login` = "' . $login . '" LIMIT 1');
            $s_login       = mysql_fetch_array($success_login);
            if ($s_login) {
                echo 'Этот логин занят!';
            } else {
                $result = mysql_query("INSERT INTO `users` (login,password) VALUES ('$login','$password')");
                
                setCookie('login', $login, time() + 86400 * 365, '');
                setCookie('password', $password, time() + 86400 * 365, '');
                header('location: /les/cabinet.php');
                exit();
                
            }
        }
    }
}
echo '<form action="?" method="POST">
Login: <br> <input type="text" name="login"> <br>
Password: <br> <input type="text" name="password"> <br>
<input type="submit" value="Regist" name="registration">
</form>';
?>

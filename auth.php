<?php
include ('base.php');
include ('functions.php');
include ('user.php');
if($user) {
header('location: /les/cabinet.php');
exit();
}

$login = text($_POST['login']);
$password = text($_POST['password']);
if(isset($_POST['start_auth'])) {
if(strlen($login) < 3 or strlen($login) > 15) {
echo 'Длина логина 3-15 символов!';
}else{
if(strlen($password) < 5 or strlen($password) > 18) {
echo 'Длина пароля 5-18 символов!';
}else{
$usr = mysql_query('SELECT * FROM `users` where `login` = "'.$login.'" AND `password` = "'.$password.'" LIMIT 1');
$auth_user = mysql_fetch_array($usr);
if($auth_user) {
setCookie('login', $auth_user['login'], time() + 86400 * 365, '');
setCookie('password', $auth_user['password'], time() + 86400 * 365, '');
header('location: /les/cabinet.php');
exit();
}else{
echo 'Неверный логин или пароль!';
} } } }
echo '<form action="" method="post">Логин: <br> <input type="text" name="login"> <br> Пароль: <br> <input type="password" name="password"> <br> <input type="submit" name="start_auth" value="Войти"></form>';
?>
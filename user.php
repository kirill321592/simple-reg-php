<?php
$login    = text($_COOKIE['login']);
$password = text($_COOKIE['password']);

if ($login && $password) {
    $usr  = mysql_query('SELECT * FROM `users` WHERE `login` = "' . $login . '" AND `password` = "' . $password . '" LIMIT 1');
    $user = mysql_fetch_array($usr);
}

if (!$login OR !$password OR !$user) {
    setCookie('login', '');
    setCookie('password', '');
}
?>

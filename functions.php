<?php

function text($text) {
$text = trim($text);
$text = mysql_escape_string($text);
$text = htmlspecialchars($text);
return $text;
}

function num($num) {
$num = intval($num);
return $num;
}

?>
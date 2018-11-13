<?php

if (isset($_POST['day']) && isset($_POST['phone'])) {
    $name = $_POST['day'];
    $phone = $_POST['phone'];
}
//yakovenko.dmitriy
$subject = 'Пробное занятие';
$addressat = "avalonsport@gmail.com";
$mail_headers="Content-type:text/html;charset=utf-8\r\n";
$mail_headers .= 'Cc: yakovenko.dmitriy@gmail.com' . "\r\n";


$message = "
День: $name<br>
Контактный телефон: $phone<br>";

$verify = mail($addressat, $subject, $message, $mail_headers);

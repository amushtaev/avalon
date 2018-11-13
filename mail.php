<?php

if (isset($_POST['day']) && isset($_POST['phone'])) {
    $name = $_POST['day'];
    $phone = $_POST['phone'];
}
//yakovenko.dmitriy
$subject = 'Пробное занятие';
$addressat = " avalonsport@gmail.com";
//$addressat = "ms@adesign.dp.ua";
$mail_headers="From: Заказ_Авалон@avalon.stimul.fitness\r\n";
$mail_headers .="Content-type:text/html;charset=utf-8\r\n";
$mail_headers .= 'Cc: yakovenko.dmitriy@gmail.com' . "\r\n";


$message = "
День: $name<br>
Контактный телефон: $phone<br>";

$success = mail($addressat, $subject, $message, $mail_headers);

if (!$success) {
    $errorMessage = error_get_last()['message'];
}

?>
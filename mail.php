<?php

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['full_name'])) {
    //$day = $_POST['day'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $full_name = $_POST['full_name'];
}
//yakovenko.dmitriy
$subject = 'Пробное занятие';
$addressat = "avalonsport@gmail.com";
//$addressat = "ms@adesign.dp.ua";
$mail_headers="From: Заказ_Авалон@avalon.stimul.fitness\r\n";
$mail_headers .="Content-type:text/html;charset=utf-8\r\n";
$mail_headers .= 'Cc: yakovenko.dmitriy@gmail.com' . "\r\n";


$message = "
Имя: $name<br>
Фамилия: $full_name<br>
Контактный телефон: $phone<br>";

$success = mail($addressat, $subject, $message, $mail_headers);

if (!$success) {
    $errorMessage = error_get_last()['message'];
}

?>
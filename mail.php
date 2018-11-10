<?php

if (isset($_POST['submit']) && isset($_POST['day']) && isset($_POST['tel'])) {
    $name = $_POST['day'];
    $phone = $_POST['tel'];
}
$subject = 'Пробное занятие';
$addressat = "ms@adesign.dp.ua";
$mail_headers="Content-type:text/html;charset=utf-8\r\n";


$message = "
День: $name<br>
Контактный телефон: $phone<br>";

$message .= '<table><tbody>';
$name_product =  $_POST['name_product'];
$price =  $_POST['price'];

$arrayObject1 = new ArrayObject($name_product);
$arrayObject2 = new ArrayObject($price);
$iterator1 = $arrayObject1->getIterator();
$iterator2 = $arrayObject2->getIterator();
for ($iterator1->rewind(), $iterator2->rewind();
     $value_product = $iterator1->current(), $value_price=$iterator2->current();
     $iterator1->next(), $iterator2->next())
{
    $message .= '<tr><td>'. $value_product .'</td><td width="70px"> | </td><td>'. $value_price .'</td></tr>';
}

$verify = mail($addressat, $subject, $message, $mail_headers);

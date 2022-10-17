<?php
ob_start();
//Сбор данных из полей формы. 
$name = $_POST['user_name'];// Берём данные из input c атрибутом name="name"
$phone = $_POST['user_phone']; // Берём данные из input c атрибутом name="phone"
$friend = $_POST['user_friend']; // Берём данные из input c атрибутом name="mail"

$token = "5585175479:AAFiOSvIKAPzYmjwdOEczKjRGjYUwDk4px8"; // Тут пишем токен
$chat_id = "191965994"; // Тут пишем ID группы, куда будут отправляться сообщения
$sitename = "можнопростоденьгами.рф"; //Указываем название сайта

$arr = array(

  'Письмо с сайта: ' => $sitename,
  'Имя: ' => $name,
  'Телефон: ' => $phone,
  'Спутник/спутница/друг' => $friend
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($fp) {
  header('Location: index.html');
ob_end_flush();
} else {
  echo "Error";
}

?>
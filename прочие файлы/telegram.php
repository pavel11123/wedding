<?php
ob_start();
/* https://api.telegram.org/bot5532826052:AAEduPNoGRAgLjsGv9c_4ynXjefxiHT1ais/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */


$token = "5532826052:AAEduPNoGRAgLjsGv9c_4ynXjefxiHT1ais";
$chat_id = "191965994";

#Данные с формы
$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$friend = $_POST['user_friend'];

#Создаем массив
$arr = array(
  'Имя: ' => $name,
  'Телефон: ' => $phone,
  'Спутник/спутница/друг' => $friend
);

/*Цикл по массиву (собираем сообщение) */
foreach($arr as $key => $value) { 
     $txt .= "<b>".$key."</b>: ".$value."%0A"; 
  }

#Отправляем сообщение
$fp=fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


if ($fp) {
  header('Location: index.html');
ob_end_flush();
} else {
  echo "Error";
}

?>
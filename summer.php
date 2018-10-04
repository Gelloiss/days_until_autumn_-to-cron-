<?
date_default_timezone_set('Europe/Moscow');
$september = new DateTime('2018-09-03');
$today = new DateTime(date('Y-m-d'));
$interval = $september->diff($today);
$days = abs($interval->format('%R%a'));
$token = "*";

$aContext = array( //Отправляем запросы через прокси, т.к. хостинг в россии (где телега заблочена)
    'http' => array(
        'proxy' => 'tcp://proxy.gelloiss.ru:4545',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);

$text = "До начала учебы осталось ".$days." дня. Скоро увидимся :)";
$sFile = file_get_contents("https://api.telegram.org/".$token."/sendMessage?chat_id=-1001240056777&parse_mode=html&text=".$text, False, $cxContext);
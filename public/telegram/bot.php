<?php
require_once 'database.php';
include __DIR__ . '/../../vendor/eleirbag89/telegrambotphp/Telegram.php';

$un = 'phplarabot';
$username = 'https://t.me/'. $un;
$bots = $db->query("SELECT * FROM `bots` WHERE `username`='{$username}'");
$bot = mysqli_fetch_assoc($bots);
$company_id = $bot['company_id'];

$telegram = new Telegram('6429866560:AAEY8KqNsf399C1DXEiOpTa2DArJRuQ_KPM');
$chat_id = $telegram->ChatID();
$text = $telegram->Text();
$result = $telegram->getData();
$message = $result['message'];


if ($message['text'] !== null){
    showStart();
}
else{
    mainPage();
}



function showStart()
{
    global $telegram, $chat_id, $db, $message, $company_id;

    $code = explode(' ', $message['text'])[1];
    $links = $db->query("SELECT * FROM `links` WHERE `code`='{$code}'");
    $link = mysqli_fetch_assoc($links);
    $link_id = $link['id'];
    $click = $link['clicked'] + 1;
    $db->query("UPDATE `links` SET `clicked`='{$click}' WHERE `code`='{$code}'");
    $first_name = $message['from']['first_name'] ?? null;
    $last_name = $message['from']['last_name'] ?? null;
    $username = $message['from']['username'] ?? null;
    $db->query("INSERT INTO `leads`(`company_id`, `link_id`,  `chat_id`, `first_name`, `last_name`, `username`, `phone`, `comment`)
                VALUES ('{$company_id}','{$link_id}', '{$chat_id}','{$first_name}','{$last_name}','{$username}','','comment')");


    $option = array(
        array($telegram->buildKeyboardButton("contact", true)));
    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Send contact");
    $telegram->sendMessage($content);
}

function mainPage()
{
    global $telegram, $chat_id;

    $option = array(
        array($telegram->buildKeyboardButton("Course"), $telegram->buildKeyboardButton("About")),
        array($telegram->buildKeyboardButton("Murajat")) );
    $keyb = $telegram->buildKeyBoard($option, $onetime=false, $resize=true);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "This is a Keyboard Test");
    $telegram->sendMessage($content);
}

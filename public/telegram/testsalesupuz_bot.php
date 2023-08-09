<?php
include __DIR__.'/../../vendor/eleirbag89/telegrambotphp/Telegram.php';

$telegram = new Telegram('6345889193:AAFqV2ywCm5wA-GCeCGtxcrak1olAOUhgvk');
$chat_id = $telegram->ChatID();
$content = array('chat_id' => $chat_id, 'text' => 'Test');
$telegram->sendMessage($content);

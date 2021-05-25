<?php

use MyApp\Classes\ChatMessages;
use MyApp\Db\Insert;
use MyApp\Db\Update;

require __DIR__ . '/vendor/autoload.php';
require __DIR__.'/Core/config.php';

$chat = new ChatMessages();
$chat->setFromUserId(5);
$chat->setUserName("Juliano");
$chat->setToUserId(1);
$chat->setMessage("Hello World");
$chat->setAct("Open");

$insert = new Insert($chat);
$insert->createChatRoom();
$insert->saveChatUser();
$insert->saveMessage();
$insert->saveChatAct();
$update = new Update($chat);

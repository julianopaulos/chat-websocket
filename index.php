<?php

use MyApp\Classes\ChatMessages;
use MyApp\Db\Update;

require __DIR__ . '/vendor/autoload.php';
require __DIR__.'/Core/config.php';
$chat = new ChatMessages();
$update = new Update($chat);

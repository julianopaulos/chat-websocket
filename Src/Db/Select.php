<?php
namespace MyApp\Db;

use MyApp\Classes\ChatMessages;
use MyApp\Db\Helper\Conn;

final class Select{
    private $chat;
    private $conn;
    
    function __construct(ChatMessages $chat){
        $this->chat = $chat;
        $this->conn = new Conn();
        $this->conn = $this->conn->getConn();
        var_dump($this->chat);
        echo "teste";
    }
}
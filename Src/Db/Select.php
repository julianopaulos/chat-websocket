<?php
namespace MyApp\Db;

use MyApp\Classes\ChatMessages;
use MyApp\Db\Helper\Conn;

final class Select{
    private $chat;
    private $conn;
    private $sql;
    private $query;
    private $results;
    
    function __construct(ChatMessages $chat){
        $this->chat = $chat;
        $this->conn = new Conn();
        $this->conn = $this->conn->getConn();
    }

    public function getChatRoom(){
        $this->sql = "
            SELECT
                id AS room_id
            FROM
                websocket_chat_room
            WHERE 
                from_user = :from_user
            AND to_user = :to_user
            ORDER BY created_at DESC
            LIMIT 1
        ";
        try{
            $this->conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
            $this->query = $this->conn->prepare($this->sql);
            $fromUserId = $this->chat->getFromUserId();
            $toUserId = $this->chat->getToUserId();
            $this->query->bindParam(":from_user", $fromUserId, \PDO::PARAM_INT);
            $this->query->bindParam(":to_user", $toUserId, \PDO::PARAM_INT);
        }catch(\Exception $error){
            die("Query Error: {$error->getMessage()}");
        }
        $this->query->execute();

        $this->results = $this->query->fetch(\PDO::FETCH_ASSOC);
        return $this->results['room_id'];
    }

    public function getUserName(){
        $this->sql = "
            SELECT
                COUNT(id) AS id
            FROM
                websocket_chat_user
            WHERE 
                name = :name
        ";
        try{
            $this->conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
            $this->query = $this->conn->prepare($this->sql);
            $name = $this->chat->getUserName();
            $this->query->bindParam(":name", $name, \PDO::PARAM_STR);
        }catch(\Exception $error){
            die("Query Error: {$error->getMessage()}");
        }
        $this->query->execute();

        $this->results = $this->query->fetch(\PDO::FETCH_ASSOC);
        return $this->results['id'];
    }
}
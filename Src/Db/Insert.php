<?php
namespace MyApp\Db;

use MyApp\Classes\ChatMessages;
use MyApp\Db\Helper\Conn;

final class Insert{
    private $chat;
    private $conn;
    private $sql;
    private $query;
    private $select;

    function __construct(ChatMessages $chat){
        $this->chat = $chat;
        $this->conn = new Conn();
        $this->conn = $this->conn->getConn();
        $this->select = new Select($chat);
    }

    public function createChatRoom(){
        $this->sql = "
            INSERT INTO
                websocket_chat_room(
                    from_user,
                    to_user,
                    active
                )
                VALUES(
                    :from_user,
                    :to_user,
                    1
                )
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

        if($this->select->getChatRoom()){
            $this->chat->setChatRoomId($this->select->getChatRoom());
        }else{
            $this->query->execute();
            $this->chat->setChatRoomId($this->conn->lastInsertId());
        }
    }


    public function saveMessage(){
        $this->sql = "
            INSERT INTO
                websocket_chat_message(
                    user_id,
                    room_id,
                    message
                )
                VALUES(
                    :user_id,
                    :room_id,
                    :message
                )
        ";
        try{
            $this->conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
            $this->query = $this->conn->prepare($this->sql);
            $userId = $this->chat->getFromUserId();
            $chatRoom = $this->chat->getChatRoomId();
            $message = $this->chat->getMessage();
            
            $this->query->bindParam(":user_id", $userId, \PDO::PARAM_INT);
            $this->query->bindParam(":room_id", $chatRoom, \PDO::PARAM_INT);
            $this->query->bindParam(":message", $message, \PDO::PARAM_STR);
        }catch(\Exception $error){
            die("Query Error: {$error->getMessage()}");
        }
        $this->query->execute();
    }

    public function saveChatUser(){
        $this->sql = "
            INSERT INTO
                websocket_chat_user(
                    name
                )
                VALUES(
                    :name
                )
        ";
        try{
            $this->conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
            $this->query = $this->conn->prepare($this->sql);
            $name = $this->chat->getUserName();
            $this->query->bindParam(":name", $name, \PDO::PARAM_STR);
        }catch(\Exception $error){
            die("Query Error: {$error->getMessage()}");
        }

        if($this->select->getUserName() === "0"){
            $this->query->execute();
            $this->chat->setToUserId($this->conn->lastInsertId());
        }else{
            return "Já existe usuário cadastrado com o mesmo nome";
        }
    }

    public function saveChatAct(){
        $this->sql = "
            INSERT INTO
                websocket_chat_act(
                    act,
                    user_id
                )
                VALUES(
                    :act,
                    :user_id
                )
        ";
        try{
            $this->conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
            $this->query = $this->conn->prepare($this->sql);
            $act = $this->chat->getAct();
            $user_id = $this->chat->getFromUserId();
            $this->query->bindParam(":act", $act, \PDO::PARAM_STR);
            $this->query->bindParam(":user_id", $user_id, \PDO::PARAM_INT);
        }catch(\Exception $error){
            die("Query Error: {$error->getMessage()}");
        }

        $this->query->execute();
    }

}
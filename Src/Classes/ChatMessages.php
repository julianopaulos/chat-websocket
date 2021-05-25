<?php
namespace MyApp\Classes;

final class ChatMessages{
    private $chatRoomId;
    private $userId;
    private $userName;
    private $message;
    

    /**
     * Get the value of chatRoomId
     */ 
    public function getChatRoomId()
    {
        return $this->chatRoomId;
    }

    /**
     * Set the value of chatRoomId
     *
     * @return  nothing
     */ 
    public function setChatRoomId($chatRoomId)
    {
        $this->chatRoomId = $chatRoomId;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  nothing
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get the value of userName
     */ 
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  nothing
     */ 
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  nothing
     */ 
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
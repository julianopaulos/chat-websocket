<?php
namespace MyApp\Classes;

final class ChatMessages{
    private $chatRoomId;
    private $fromUserId;
    private $toUserId;
    private $userName;
    private $message;
    private $act;
    

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
    public function setChatRoomId(int $chatRoomId)
    {
        $this->chatRoomId = $chatRoomId;
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
    public function setUserName(string $userName)
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
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * Get the value of act
     */ 
    public function getAct()
    {
        return $this->act;
    }

    /**
     * Set the value of act
     *
     * @return  nothing
     */ 
    public function setAct(string $act)
    {
        $this->act = $act;
    }

    /**
     * Get the value of fromUserId
     */ 
    public function getFromUserId()
    {
        return $this->fromUserId;
    }

    /**
     * Set the value of fromUserId
     *
     * @return  nothing
     */ 
    public function setFromUserId(int $fromUserId)
    {
        $this->fromUserId = $fromUserId;
    }

    /**
     * Get the value of toUserId
     */ 
    public function getToUserId()
    {
        return $this->toUserId;
    }

    /**
     * Set the value of toUserId
     *
     * @return  nothing
     */ 
    public function setToUserId(int $toUserId)
    {
        $this->toUserId = $toUserId;
    }
}
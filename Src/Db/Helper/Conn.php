<?php
namespace MyApp\Db\Helper;

final class Conn{
    private static $connection = null;
    private static $dbhost = DBHOST;
    private static $dbname = DBNAME;
    private static $dbuser = DBUSER;
    private static $dbpass = DBPASS;

    private static function setConn(){
        try{
            if(self::$connection === null){
                self::$connection = new \PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname.";charset=utf8", self::$dbuser, self::$dbpass);
            }
        }catch(\Exception $error){
            die("Connection Error: {$error->getMessage()}");
        }
        return self::$connection;
    }

    public function getConn(){
        return self::setConn();
    }

}